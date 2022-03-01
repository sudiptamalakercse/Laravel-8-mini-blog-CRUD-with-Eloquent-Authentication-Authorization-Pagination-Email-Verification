<x-create_or_edit_post
title='Create Post'
heading='Create A New Post'
:errorsAny='$errors->any()' 
:errorsAll='$errors->all()' 
{{-- :actionLink='route("")'  --}}
{{-- :post="$post"  --}}
actionButton="Post" 
/>