<?php


namespace app\admin\constant;


class CustomerConstant
{
    const CUSTOMER_IMPORT_SUCCESS = '已完成'; //待签单
    const CUSTOMER_IMPORT_DOING = '进行中'; //已约见
    const CUSTOMER_IMPORT_NONE = '未录入'; //待约见

    const TO_SIGN_BILL = 1;  //待签单
    const DONE_APPOINTMENT = 2; //已约见
    const TODO_APPOINTMENT = 3; //待约见
    const EFFICIENT_CUSTOMER = 4; //有效客户

    const TO_SIGN_BILL_NAME = 'S:待签单'; //待签单
    const DONE_APPOINTMENT_NAME = 'A:已约见'; //已约见
    const TODO_APPOINTMENT_NAME = 'B:待约见'; //待约见
    const EFFICIENT_CUSTOMER_NAME = 'C:有效客户'; //有效客户

    static $importance_degree_array = [
        self::TO_SIGN_BILL => self::TO_SIGN_BILL_NAME,
        self::DONE_APPOINTMENT => self::DONE_APPOINTMENT_NAME,
        self::TODO_APPOINTMENT => self::TODO_APPOINTMENT_NAME,
        self::EFFICIENT_CUSTOMER => self::EFFICIENT_CUSTOMER_NAME,
    ];

    static function importance_degree_value($key){
        return self::$importance_degree_array[$key];
    }

    static function importance_degree_array(){
        return self::$importance_degree_array;
    }

    const NONE_AUDIT = 0;  //未审核
    const AUDIT_SUCCESS = 1; //通过
    const AUDIT_FAILURE = 2; //未通过

    const NONE_AUDIT_NAME = "未审核";  //未审核
    const AUDIT_SUCCESS_NAME = "通过"; //通过
    const AUDIT_FAILURE_NAME = "未通过"; //未通过

    static $audit_array = [
        self::NONE_AUDIT => self::NONE_AUDIT_NAME,
        self::AUDIT_SUCCESS => self::AUDIT_SUCCESS_NAME,
        self::AUDIT_FAILURE => self::AUDIT_FAILURE_NAME,
    ];

    static function audit_value($key){
        return self::$audit_array[$key];
    }

    static function audit_array(){
        return self::$audit_array;
    }

}