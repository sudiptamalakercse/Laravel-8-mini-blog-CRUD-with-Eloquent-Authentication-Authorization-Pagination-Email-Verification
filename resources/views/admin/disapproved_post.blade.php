<x-post_list
title='Disapproved Posts'  
heading='Disapproved Posts'
:errorsAny="$errors->any()" 
:errorsAll="$errors->all()" 
userType="admin" 
:posts="$posts" 
action1Link='approve_or_disapprove'
action1="Approve"
action2Link='posts.delete'
action2="Delete" 
/>