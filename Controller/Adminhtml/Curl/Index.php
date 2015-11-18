<?php

namespace Foggyline\Sentinel\Controller\Adminhtml\Curl;

class Index extends \Foggyline\Sentinel\Controller\Adminhtml\Curl
{
    /**
     * @var \Magento\Framework\HTTP\Adapter\CurlFactory
     */
    protected $_curlFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\HTTP\Adapter\CurlFactory $curlFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\HTTP\Adapter\CurlFactory $curlFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_curlFactory = $curlFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Sentinel cURL Logs'));
        return $resultPage;
    }
}
