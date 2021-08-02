<?php

use Illuminate\Database\Seeder;
use App\Link;
class LinkTableValues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->CreateLink('المقالات','#','fa fa-file',0,1);
        $this->CreateLink('تصنيفات المقالات','/admin/category','fa fa-list',1,1);
        $this->CreateLink('ادارة المقالات','/admin/article','fa fa-file',1,1);
        $this->CreateLink('اضافة مقال جديد','/admin/article/create','fa fa-plus',1,1);
        $this->CreateLink('ادارة التعليقات','/admin/comment','fa fa-comment',1,1);
        $this->CreateLink('الشرائح','#','fa fa-tv',0,1);
        $this->CreateLink('ادارة الشرائح','/admin/slider','fa fa-list',6,1);
        $this->CreateLink('اضافة شريحة جديدة','/admin/slider/create','fa fa-plus',6,1);
        $this->CreateLink('المستخدمين','#','fa fa-users',0,1);
        $this->CreateLink('ادارة المستخدمين','/admin/admin','fa fa-list',9,1);
        $this->CreateLink('اضافة مستخدم جديد','/admin/admin/create','fa fa-plus',9,1);
        
    }
    public function CreateLink($title,$url,$icon,$parent,$showInMenu){
        $link = new Link();
        $link->title=$title;
        $link->parent_id=$parent;
        $link->show_in_menu=$showInMenu;
        $link->icon=$icon;
        $link->url=$url;
        $link->save();
    }
}
