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

namespace Magestore\Student\Api;

interface StudentRepositoryInterface
{
    /**
     * Return data object for specified checkout agreement ID and store.
     *
     * @return \Magestore\Student\Api\Data\StudentInterface
     */
    public function get($id);
    /**
     * Lists active student.
     *
     * @return \Magestore\Student\Api\Data\StudentInterface[]
     */
    public function getList();

    /**
     * Create/Update new student with data object values
     *
     * @param \Magestore\Student\Api\Data\StudentInterface $data
     * @return \Magestore\Student\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException If there is a problem with the input
     * @throws \Magento\Framework\Exception\NoSuchEntityException If a ID is sent but the entity does not exist
     */
    public function save(\Magestore\Student\Api\Data\StudentInterface $data);

    /**
     * Delete student
     *
     * @param \Magestore\Student\Api\Data\StudentInterface $data
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException If there is a problem with the input
     */
    public function delete(\Magestore\Student\Api\Data\StudentInterface $data);
}