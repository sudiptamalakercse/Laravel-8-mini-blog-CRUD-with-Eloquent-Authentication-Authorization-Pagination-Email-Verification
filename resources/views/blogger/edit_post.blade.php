<x-create_or_edit_post_layout 
title='Update Post'
heading='Update The Post'
:errorsAny='$errors->any()' 
:errorsAll='$errors->all()' 
{{-- :actionLink='route("")'  --}}
:post="$post" 
actionButton="Update" 
/>