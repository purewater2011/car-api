<?php
/**
 * author: Eric.chen
 * Date: 16/3/26
 * Description:
 */

namespace app\Services\Auth;


use App\Repositories\Interfaces\PermissionRepository;
use App\Repositories\Interfaces\RoleRepository;
use App\Repositories\Interfaces\UserRepository;

class AuthorizationService extends AuthorizationAbstract{

    private $role;

    private $permission;

    /**
     * 初始化权限管理,注入角色仓库和权限仓库.
     * 注意:在provider里绑定仓库到对应的Eloquent
     * @param RoleRepository $role
     * @param PermissionRepository $permission
     */
    public function __construct(RoleRepository $role, PermissionRepository $permission){
        $this->role = $role;

        $this->permission = $permission;

    }

    /**
     * 添加角色
     * @param $name
     * @param $display
     * @param $desc
     * @return mixed
     */
    public function addRole($name, $display, $desc){
        $this->role->name = $name;
        $this->role->display_name = $display;
        $this->role->description = $desc;
        return $this->role->save();
    }

    /**
     * 添加权限
     * @param $name
     * @param $display
     * @param $desc
     * @return mixed
     */
    public function  addPermission($name, $display, $desc){
        $this->permission->name = $name;
        $this->permission->display_name = $display;
        $this->permission->description = $desc;
        return $this->permission->save();
    }

    /**
     * 用户绑定角色
     * @param UserRepository $user
     * @param $role:an Role object, array, or id
     * @return mixed
     */
    public function attachRoles(UserRepository $user, $role){
        return  $user->attachRole($role);
    }

    /**
     * 角色绑定权限
     * @param RoleRepository $role
     * @param $permission:a Permission object, array
     * @return mixed
     */
    public function attachPermissions(RoleRepository $role, $permission){
        if(is_array($permission)){
            return $role->attachPermissions($permission);
        }
        return $role->attachPermission($permission);
    }

    /**
     * 获取用户的所有角色
     * @param UserRepository $user
     * @return mixed
     */
    public function getRoles(UserRepository $user){
        return $this->role->with('user', $user)->all();
    }

    /**
     * 获取角色的所有权限
     * @param RoleRepository $role
     * @return mixed
     */
    public function getPermissions(RoleRepository $role){
        return $this->permission->with('roles', $role)->all();
    }

    /**
     * 解除用户绑定的角色
     * @param UserRepository $user
     * @param $role
     * @return mixed
     */
    public function detachRoles(UserRepository $user, $role){
        return $user->detachRole($role);
    }

    /**
     * 解除角色绑定的权限
     * @param RoleRepository $role
     * @param $permissions
     * @return mixed
     */
    public function detachPermissions(RoleRepository $role, $permissions){
        return $role->detachPermissions($permissions);
    }
}