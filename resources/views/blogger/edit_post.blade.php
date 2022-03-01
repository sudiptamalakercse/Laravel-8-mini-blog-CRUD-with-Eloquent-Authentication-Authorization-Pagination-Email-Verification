<x-create_or_edit_post
title='Update Post'
heading='Update The Post'
:errorsAny='$errors->any()' 
:errorsAll='$errors->all()' 
{{-- :actionLink='route("")'  --}}
:post="$post" 
actionButton="Update" 
/>