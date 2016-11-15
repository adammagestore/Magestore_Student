<?php
/**
 * Magestore
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magestore.com license that is
 * available through the world-wide-web at this URL:
 * http://www.magestore.com/license-agreement.html
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Magestore
 * @package     Magestore_Student
 * @copyright   Copyright (c) 2012 Magestore (http://www.magestore.com/)
 * @license     http://www.magestore.com/license-agreement.html
 */

namespace Magestore\Student\Model;
use Magestore\Student\Api\StudentRepositoryInterface;
use Magestore\Student\Model\ResourceModel\Student\CollectionFactory as StudentCollectionFactory;
use Magestore\Student\Model\ResourceModel\Student\Collection as StudentCollection;
use Magestore\Student\Model\ResourceModel\Student as StudentResource;




class StudentRepository implements StudentRepositoryInterface
{
    /**
     * Collection factory.
     *
     * @var StudentCollectionFactory
     */
    private $collectionFactory;

    /**
     * Collection.
     *
     * @var StudentCollection
     */
    private $collection;

    /**
     * Store manager.
     *
     * @var  \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * Scope config.
     *
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var StudentResource
     */
    private $resourceModel;

    /**
     * @var StudentFactory
     */
    private $studentFactory;

    public function __construct(
        StudentCollectionFactory $collectionFactory,
        StudentResource $studentResource,
        StudentFactory $studentFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->studentFactory = $studentFactory;
        $this->resourceModel = $studentResource;
    }

    /**
     * {@inheritdoc}
     *
     * @return \Magestore\Student\Api\Data\StudentInterface student data object.
     */
    public function get($id)
    {
        /** @var AgreementFactory $agreement */
        $student = $this->studentFactory->create();
        $this->resourceModel->load($student, $id);
        if (!$student->getId()) {
            throw new NoSuchEntityException(__('Student with specified ID "%1" not found.', $id));
        }
        return $student;
    }

    /**
     * {@inheritdoc}
     *
     * @return \Magestore\Student\Api\Data\StudentInterface[] Array of student data objects.
     */
    public function getList()
    {
        /** @var $studentCollection StudentCollection */
        $studentCollection = $this->collectionFactory->create();
        $studentDataObjects = [];
        foreach ($studentCollection as $student) {
            $studentDataObjects[] = $student;
        }
        return $studentDataObjects;
    }

    /**
     * {@inheritdoc}
     *
     * @return \Magestore\Student\Api\Data\StudentInterface[] Array of student data objects.
     */
    public function save(\Magestore\Student\Api\Data\StudentInterface $data)
    {
        $id = $data->getStudentId();
        if ($id) {
            $data = $this->get($id)->addData($data->getData());
        }
        try {
            $this->resourceModel->save($data);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(
                __('Unable to save student %1', $data->getAgreementId())
            );
        }
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(\Magestore\Student\Api\Data\StudentInterface $data)
    {
        try {
            $this->resourceModel->delete($data);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\CouldNotDeleteException(
                __('Unable to remove student %1', $data->getAgreementId())
            );
        }
        return true;
    }
}