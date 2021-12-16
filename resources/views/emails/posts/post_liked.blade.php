@component('mail::message')
# Introduction

{{$liker->name}} liked one of your posts

@component('mail::button', ['url' => route('comments', $post)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
