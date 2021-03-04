<?php
namespace Custom\Tabs\Model\Category\Attribute\Source;

use Magento\Framework\Option\ArrayInterface;

class Page implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => '1', 'label' => __('Featured Image')],
            ['value' => '0', 'label' => __('Carousel')]
        ];
    }
 

}