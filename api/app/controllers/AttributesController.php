<?php

class AttributesController extends MageController {

    /**
     * @method getOptions
     * @param  string $attributeName
     * @return string
     */
    public function getOptions($attributeName) {

        $attribute = Mage::getSingleton('eav/config')->getAttribute('catalog_product', $attributeName);
        $options   = array();

        if ($attribute->usesSource()) {
            $options = $attribute->getSource()->getAllOptions(false);
        }

        $response = array();

        foreach ($options as $option) {

            $response[] = array(
                'id'    => (int) $option['value'],
                'label' => $option['label']
            );

        }

        return Response::json($response);

    }

}