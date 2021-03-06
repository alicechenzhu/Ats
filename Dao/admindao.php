<?php
namespace Ats\Dao;
include("../Conn/conn.php");
use Ats\Conn\Conn;
class AdminDo{
    //增加管理员
    function addAdmin($admin_id,$admin_name,$admin_password,$admin_type){
        Conn::init();
        $SQL_ADD_ADMIN='insert into ats_admin(Admin_Id,Admin_Name,Admin_Password,Admin_Type)values('.$admin_id.','.$admin_name.','.$admin_password.','.$admin_type.')';
        Conn::init();
        $result=Conn::excute($SQL_ADD_ADMIN);
        Conn::close();
        return $result;//返回记录集 or false
    }
    //删除管理员
    function deleteAdmin($admin_id){
        Conn::init();
        $SQL_DELETE_ADMIN='delete from ats_admin where Admin_Id='.$admin_id;
        Conn::init();
        $result=Conn::excute($SQL_DELETE_ADMIN);
        Conn::close();
        return $result;//返回true or false
        }
        //修改管理员信息（名字，密码，类型）。依赖：admin_id
    function updateAdmin($admin_id,$admin_name,$admin_password,$admin_type){
        Conn::init();
        $SQL_UPDATE_ADMIN='update ats_admin set Admin_Name='.$admin_name.',Admin_Password='.$admin_password.',Admin_type='.$admin_type.'where Admin_Id='.$admin_id;
        Conn::init();
        $result=Conn::excute($SQL_UPDATE_ADMIN);
        Conn::close();
        return $result;//返回true or false
    }
    //查找所有管理员
    function selectAdmin(){
        Conn::init();
        $SQL_SELECT_ADMIN='select Admin_Id,Admin_Name,Admin_type from ats_admin';
        Conn::init();
        $result=Conn::query($SQL_SELECT_ADMIN);
        Conn::close();
        return $result;//返回记录集 or false
    }
    //查找指定管理员存在否。依赖：admin_id
    function existAdmin($admin_id){
        Conn::init();
        $SQL_FIND_ADMIN='select COUNT(*) from ats_admin where Admin_Id='.$admin_id;
        Conn::init();
        $result=Conn::query($SQL_FIND_ADMIN);
        Conn::close();
        return $result;//返回0 or 1
    }
    //登录查询
    static function loginAdmin($admin_id,$admin_password){
        $SQL_LOGIN_ADMIN='select COUNT(*) as counts from ats_admin where Admin_Id='.$admin_id.' and Admin_Password='.$admin_password;
        Conn::init();
        $result=Conn::query($SQL_LOGIN_ADMIN);
        Conn::close();
        return mysql_fetch_array($result)[0];//返回0 or 1
    }
}