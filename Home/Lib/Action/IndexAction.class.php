<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$title="小米,华为网上商城,期待你的光顾!";
    	$this->assign('title',$title);
        $mes=M('Tb_message');
        $mrows=$mes->limit(1)->select();
        $mrows2=$mes->limit(1,5)->select();
        $active=$mrows[0]['img'];
        $this->assign('active',$active);
        $this->assign('mrows2',$mrows2);
        $shop=M('Tb_shangpin');
        $xiaomi=$shop->where('typeid=4')->order('rand()')->select();
        $this->assign('xiaomi',$xiaomi);
        $huawei=$shop->where('typeid=8')->order('rand()')->select();
        $this->assign('huawei',$huawei);
    	$this->display();
    }

    public function vcode(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
        // Image::GBVerify();
    }
    
}