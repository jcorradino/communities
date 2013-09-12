<label class="metainfo" for="downvote-comment-<?php echo $id; ?>">(<?php echo (!empty($actions['downvote'])) ? $actions['downvote']->total : 0; ?>)</label>
<button 
	<?php if($logged_in) { ?>
		shc:options="{
			actions:{
				post:{
					id:<?php echo $id; ?>,
					name:'downvote',
					sub_type:'<?php echo $sub_type; ?>',
					type:'<?php echo $type; ?>'
				}
			}
		}"
	<?php } else { ?> 
		shc:gizmo:options="{
			moodle:{
				width:480,
				target:ajaxdata.ajaxurl,
				type:'POST',
				data:{
					action:'get_template_ajax',
					template:'page-login'
				}
			}
		}" 
		shc:gizmo="moodle"
	<?php } ?> type="button" name="downvote" <?php echo (!empty($sub_type)) ? "m.$sub_type-action" : "m:gizmo" ; ?>="downvote" class="downvote<?php if($actions['downvote']->active_for_user) { ?> active<?php } ?>" value="down vote" title="Down vote this <?php echo $type; ?>" id="downvote-comment-<?php echo $id; ?>">down vote</button>

<label class="metainfo" shc:gizmo="actions" for="upvote-comment-<?php echo $id; ?>">(<?php echo (!empty($actions['upvote'])) ? $actions['upvote']->total : 0; ?>)</label>
<button 
	<?php if($logged_in) { ?>
		shc:options="{
			actions:{
				post:{
					id:<?php echo $id; ?>,
					name:'upvote',
					sub_type:'<?php echo $sub_type; ?>',
					type:'<?php echo $type; ?>'
				}
			}
		}"
	<?php } else { ?> 
		shc:gizmo:options="{
			moodle:{
				width:480,
				target:ajaxdata.ajaxurl,
				type:'POST',
				data:{
					action:'get_template_ajax',
					template:'page-login'
				}
			}
		}" 
		shc:gizmo="moodle"
	<?php } ?> type="button" name="upvote" <?php echo (!empty($sub_type)) ? "m.$sub_type-action" : "m:gizmo" ; ?>="upvote" class="upvote<?php if($actions['upvote']->active_for_user) { ?> active<?php } ?>" value="helpful" title="Up vote this <?php echo $type; ?>" id="upvote-comment-<?php echo $id; ?>">helpful</button>