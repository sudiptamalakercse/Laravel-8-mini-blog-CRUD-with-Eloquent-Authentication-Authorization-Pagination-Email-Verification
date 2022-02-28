
<x-pending_post_layout  
:errorsAny="$errors->any()" 
:errorsAll="$errors->all()" 
actionFor="blogger" 
:posts="$posts" 
action1Link='posts.edit'
action1="Edit"
action2Link='posts.delete'
action2="Delete" 
/>