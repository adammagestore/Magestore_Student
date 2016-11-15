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

namespace Magestore\Student\Api\Data;

interface StudentInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const STUDENT_ID = 'student_id';
    const STUDENT_NAME = 'name';
    const STUDENT_CLASS = 'class';
    const STUDENT_UNIVERSITY = 'university';
    /**#@-*/

    /**
     * Returns the student ID.
     *
     * @return int student ID.
     */
    public function getStudentId();

    /**
     * Sets the student ID.
     *
     * @param int $id
     * @return $this
     */
    public function setStudentId($id);

    /**
     * Returns the student name.
     *
     * @return int student name.
     */
    public function getName();

    /**
     * Sets the student name.
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Returns the student class.
     *
     * @return string student class.
     */
    public function getClass();

    /**
     * Sets the student class.
     *
     * @param string $class
     * @return $this
     */
    public function setClass($class);

    /**
     * Returns the student university.
     *
     * @return string student university.
     */
    public function getUniversity();

    /**
     * Sets the student university.
     *
     * @param string $university
     * @return $this
     */
    public function setUniversity($university);

}