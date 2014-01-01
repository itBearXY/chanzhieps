<?php
/**
 * The edit book view file of book of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author      Tingting Dai<daitingting@xirangit.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php 
$path = explode(',', $node->path);
js::set('path', $path);
?>
<div class="panel">
  <div class="panel-heading">
    <strong><i class="icon-edit"></i> <?php echo $lang->edit . $lang->book->typeList[$node->type];?></strong>
  </div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post' class='form-inline' action='<?php echo inlink('edit', "nodeID=$node->id")?>'>
      <table class='table table-form'>
        <tr>
          <th class='col-xs-1'><?php echo $lang->book->author;?></th>
          <td><?php echo html::input('author', $node->author, "class='form-control'");?></td>
        </tr>
        <?php if($node->type != 'book'):?>
        <tr>
          <th><?php echo $lang->book->parent;?></th>
          <td><?php echo html::select('parent', $optionMenu, $node->parent, "class='chosen form-control'");?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <th><?php echo $lang->book->title;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::input('title', $node->title, 'class="form-control"');?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->book->alias;?></th>
          <td>
            <?php if($node->type == 'book'):?>
            <div class='required required-wrapper'></div>
            <?php endif;?>
            <div class='input-group text-1'>
              <span class='input-group-addon'>http://<?php echo $this->server->http_host . $config->webRoot?>book/id@</span>
              <?php echo html::input('alias', $node->alias, "class='form-control' placeholder='{$lang->alias}'");?>
              <span class='input-group-addon'>.html</span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->book->keywords;?></th>
          <td><?php echo html::input('keywords', $node->keywords, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->book->summary;?></th>
          <td><?php echo html::textarea('summary', $node->summary, "class='form-control' rows='2'");?></td>
        </tr>
        <?php if($node->type == 'article'):?>
        <tr>
          <th><?php echo $lang->book->content;?></th>
          <td valign='middle'><?php echo html::textarea('content', $node->content, "rows='6' class='form-control'");?></td>
        </tr>
        <?php endif;?>
        <tr>
          <th></th>
          <td><?php echo html::submitButton() . html::hidden('referer', $this->server->http_referer);?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
