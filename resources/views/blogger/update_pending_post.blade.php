<x-post_list
title='Updated Pending Posts'  
heading='Updated Pending Posts'
:errorsAny="$errors->any()" 
:errorsAll="$errors->all()" 
userType="blogger" 
:posts="$posts" 
action1Link='posts.edit'
action1="Edit"
action2Link='posts.delete'
action2="Delete" 
/>