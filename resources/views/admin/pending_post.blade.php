
<x-post_list
title='Pending Posts'
heading='Pending Posts'
:errorsAny="$errors->any()" 
:errorsAll="$errors->all()" 
userType="admin" 
:posts="$posts" 
action1Link='approve_or_disapprove'
action1="Approve"
action2Link='posts.delete'
action2="Delete" 
/>