<x-post_list  
heading='Approved Posts'
:errorsAny="$errors->any()" 
:errorsAll="$errors->all()" 
userType="admin" 
:posts="$posts" 
action1Link='approve_or_disapprove'
action1="Disapprove"
action2Link='posts.delete'
action2="Delete" 
/>