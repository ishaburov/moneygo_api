<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\MetaResource;
use MoneyGo\Resource\PaginationResource;
use MoneyGo\Resource\VoucherResource;

final class Voucher extends BaseMethod
{
    private $page = 1;

    public function setPage($page): Voucher
    {
        $this->page = $page;
        return $this;
    }

    public function response(): Voucher
    {
        $content = $this->client
            ->get("api/vouchers", [
                'headers' => [
                    'Authorization' => $this->accessToken
                ],
                'query' => ['page' => $this->page]
            ])
            ->getBody()
            ->getContents();

        $this->setOriginal($content);

        $result = $this->decode($content);

        $this->setArrayResult($result);

        return $this;
    }

    public function getResult(): PaginationResource
    {
        $data = $this->arrayResult['data'];
        $items = [];

        foreach ($data['items'] as $item) {
            $voucherResource = new VoucherResource();
            $voucherResource->setId($item['id']);
            $voucherResource->setAmount($item['amount']);
            $voucherResource->setStatus($item['status']);
            $voucherResource->setSecret($item['secret']);
            $voucherResource->setDateCreated($item['dateCreated']);
            $voucherResource->setCurrencyCode($item['currencyCode']);

            $items[] = $voucherResource;
        }
        $meta = new MetaResource();

        $meta->setLastPage($data['meta']['last_page']);
        $meta->setPage($data['meta']['page']);
        $meta->setPerPage($data['meta']['per_page']);
        $meta->setTotal($data['meta']['total']);

        $pagination = new PaginationResource();

        $data['items'] = $items;
        $data['meta'] = $meta;

        $pagination->setItems($items);
        $pagination->setMeta($meta);

        return $pagination;
    }
}