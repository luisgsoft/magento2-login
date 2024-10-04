<?php
/**
 * Copyright © gsoft All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gsoft\Login\Observer\Frontend\Customer;

use \Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;

class Login implements ObserverInterface
{

    /**
     * @var \Magento\Framework\App\ResponseFactory
     */
    private $responseFactory;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    private $url;
    private $customerSession;
    private $messageManager;
    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
    ) {
        $this->responseFactory = $responseFactory;
        $this->url = $url;
        $this->redirect = $context->getRedirect();
        $this->customerSession= $customerSession;
        $this->messageManager = $messageManager;
        $this->scopeConfig = $scopeConfig;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // Check if user is Blocked
        $idBlock = $this->customerSession->getCustomer()->getGroupId();
        $id_lock=$this->scopeConfig->getValue("gsoft_login/general/locked_group");

        if($idBlock == $id_lock){
            // Check if user get a Custom Message
            $customMessage = $this->scopeConfig->getValue("gsoft_login/general/locked_group_msg");
            if ($customMessage) {
                // Custom Customer Message
                $this->messageManager->addErrorMessage($customMessage);
            } else {
                $this->messageManager->addErrorMessage(__('Your account has been blocked'));
            }

            // Logout & redirect
            $this->customerSession->logout();
            $redirectionUrl = $this->url->getUrl('customer/account/login');
            $this->responseFactory->create()->setRedirect($redirectionUrl)->sendResponse();
            return $this;
        } else {
            // LOGIN OK -> CODE HERE
        }

    }
}

