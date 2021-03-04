<?php
namespace Custom\Tabs\Model\Category\Attribute\Source;

use Magento\Framework\Option\ArrayInterface;

class Feature implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => '1', 'label' => __('Yes')],
            ['value' => '2', 'label' => __('No')]
        ];
    }
}