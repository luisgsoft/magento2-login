<?php

namespace Gsoft\Login\Model\Config\Source;

use Magento\Customer\Model\ResourceModel\Group\Collection as GroupCollection;
use Magento\Framework\Data\OptionSourceInterface;

class CustomerGroup implements OptionSourceInterface
{
    protected $groupCollection;

    public function __construct(GroupCollection $groupCollection)
    {
        $this->groupCollection = $groupCollection;
    }

    public function toOptionArray()
    {
        $options = [];

        // Opción de "No seleccionar ningún grupo"
        $options[] = [
            'value' => '',
            'label' => __('No Group')
        ];

        // Obtener los grupos de clientes
        $groups = $this->groupCollection->toOptionArray();

        foreach ($groups as $group) {
            $options[] = $group;
        }

        return $options;
    }
}