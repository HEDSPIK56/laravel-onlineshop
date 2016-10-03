<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog.new.post'));
});

Breadcrumbs::register('tasks', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tasks', route('getTask'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});

/**
 * Admin section
 */
Breadcrumbs::register('Dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::register('admin.user.index', function($breadcrumbs)
{
    $breadcrumbs->parent('Dashboard');
    $breadcrumbs->push('User', route('admin.system.user.index'));
});

Breadcrumbs::register('admin.user.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push('Creat User', route('admin.system.user.create'));
});

Breadcrumbs::register('admin.user.edit', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push($user->profile->getFullName(), route('admin.system.user.edit',['id' => $user->id]));
});

Breadcrumbs::register('admin.user.detail', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push($user->profile->getFullName(), route('admin.system.user.show',['id' => $user->id]));
});

/**
 * End admin section
 */
