<?php
namespace Custom\Tabs\Model\Category\Attribute\Source;

use Magento\Framework\Option\ArrayInterface;

class Testimonial implements ArrayInterface
{
     public function toOptionArray()
    {


        $arr = $this->toArray();
        $ret = [];

        foreach ($arr as $key => $value)
        {

            $ret[] = [
                'value' => $key,
                'label' => $value
            ];
        }

        return $ret;
    }

 public function toArray()
    {

    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    $model=$objectManager->create('Swissup\Testimonials\Model\Data');
    $datacollection=$model->getCollection();

        $catagoryList = array();
        foreach ($datacollection as $category){

            $catagoryList[] = $category['name'];
        }

        return $catagoryList;
    }

}