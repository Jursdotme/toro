# [Toro Theme](http://jurs.me)

#####This theme is built on tidbits of some of the best souces around the web.

#####The grid is a customised version of the [Foundation](http://foundation.zurb.com/) grid. The main difference being the reversal of the media queries. I dont feel that mobile first at the cost of IE8 support is worthwhile yet.

#####A few of the Foundation design elements are also carried over (Panels, forms etc.).

#####Ill write about the rest of the stuff later...



## Basic
The grid system i based on Foundation by [ZURB](http://zurb.com)

Start by adding an element with a class of row. This will create a horizontal block to contain vertical columns. Then add divs with a column class within that row. You can use column or columns - the only difference is grammar. Specify the widths of each column with the large-#, medium-#, and small-# classes.

Toro is not mobile first. Code for large screens and smaller devices will inherit those styles. The customize medium and large screens as necessary

**HTML**
```html
<div class="row">
	<div class="small-2 large-4 columns">...</div>
	<div class="small-4 large-4 columns">...</div>
	<div class="small-6 large-4 columns">...</div>
</div>
<div class="row">
	<div class="large-3 columns">...</div>
	<div class="large-6 columns">...</div>
	<div class="large-3 columns">...</div>
</div>
<div class="row">
	<div class="small-6 large-2 columns">...</div>
	<div class="small-6 large-8 columns">...</div>
	<div class="small-12 large-2 columns">...</div>
</div>
<div class="row">
	<div class="small-3 columns">...</div>
	<div class="small-9 columns">...</div>
</div>
<div class="row">
	<div class="large-4 columns">...</div>
	<div class="large-8 columns">...</div>
</div>
<div class="row">
	<div class="small-6 large-5 columns">...</div>
	<div class="small-6 large-7 columns">...</div>
</div>
<div class="row">
	<div class="large-6 columns">...</div>
	<div class="large-6 columns">...</div>
</div>
```

##Block Grids

####Basic
Use a simple large-block-# class to code up the block grid and specify the number of items in a row.

#####HTML
```html
<ul class="large-block-grid-3">
  <li><!-- Your content goes here --></li>
  <li><!-- Your content goes here --></li>
  <li><!-- Your content goes here --></li>
</ul>
```

---

####Advanced
Use additional classes to specify a different number of items in a row for each screen size.

**HTML**
```html
<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
  <li><!-- Your content goes here --></li>
  <li><!-- Your content goes here --></li>
  <li><!-- Your content goes here --></li>
  <li><!-- Your content goes here --></li>
  <li><!-- Your content goes here --></li>
  <li><!-- Your content goes here --></li>
</ul>
```

If you use the `large-block-grid` only, the grid will keep its spacing and configuration no matter the screen size. If you use `small-block-grid` only, the list items will stack on top of each other for small devices. If you use both of those classes combined, you can control the configuration and layout separately for each breakpoint.
`medium-block-grid` may also be used.