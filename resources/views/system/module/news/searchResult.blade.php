<?php foreach ($newsCollection as $news): ?>
<tr role="row" class="odd type-news" news_id="<?php  echo $news->NewsID?>">
    <td><img src="<?php echo "/storage/users-upload/news/".$news->ImageTitle?>" alt=""></td>
    <td><?php echo $news->Title?></td>
    <td><?php echo $news->Describe?></td>
    <td><?php echo $news->IsHotNews ? "Tin nóng" : "Tin thường"?></td>
    <td><?php echo $news->StatusID ? "Đã phát hành" : "Chưa phát hành"?></td>
    <td><?php echo $news->ReleaseDate?></td>
    <td><?php echo $news->Author?></td>
    <td><?php echo $news->CreateUserID ? $news->CreateUserID : ""?></td>
    <td><?php echo $news->CreateDate?></td>
    <td><?php echo isset($news->LastModifyUserID) ? $news->LastModifyUserID : ""?></td>
    <td><?php echo $news->LastModifyDate?></td>
    <td>
        <a id="news-edit" class="toolbar-btn action-on-header" href="#">
            <i class="fa fa-pencil-square-o"></i> Sửa</a>
        <a id="news-delete" class="toolbar-btn action-on-header" href="#">
            <i class="fa fa-times-circle"></i> Xóa</a>
    </td>
</tr>
<?php endforeach;?>