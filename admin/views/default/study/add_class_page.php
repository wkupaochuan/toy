
<div class="headbar">
    <div class="position"><span>课程管理</span><span>></span><span>添加课程</span></div>
</div>
<div class="content_box">
<div class="content form_content">
        <table class="gridtable">
            <tr>
                {foreach $class_type_dic as $class_type}
                {if $class_type['class_type_id'] == 1}
                <td>
                    <a href="" target="_self">{$class_type['display_name']}</a>
                </td>
                {/if}
                {if $class_type['class_type_id'] == 2}
                <td>
                    <a href="" target="_self">{$class_type['display_name']}</a>
                </td>
                {/if}
                {if $class_type['class_type_id'] == 3}
                <td>
                    <a href="" target="_self">{$class_type['display_name']}</a>
                </td>
                {/if}
                {if $class_type['class_type_id'] == 4}
                <td>
                    <a href="/study/index/add_eng_word_page" target="_self">{$class_type['display_name']}</a>
                </td>
                {/if}
                {/foreach}
            </tr>
        </table>
</div>
</div>

<!--js-->
<script type="text/javascript">
    seajs.use('study/add_class');
</script>