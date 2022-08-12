<?php get_header(); ?>
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package OBE
 */

$categories = get_queried_object();
$cate_id = $categories->term_id;
$cate_name = $categories->name;
$slug = $categories->slug;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class='wrapper-page-category-blog'>
        <div class="wrapper-blog-banner">
            <img class="bg-blog-banner" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-banner-min.png" alt="">
            <img class="star-blog-banner" src="<?php echo get_template_directory_uri(); ?>/assets/images/star-dot.svg" alt="">
        </div>
        <div class="wrapper-blog-popular wrapper">
            <div class="wrapper-logo">
                <img class="blog-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog_logo.svg" alt="">
            </div>
        </div>
        <div class="wrapper-breadcrumb wrapper">
            <span> 
                <a href="<?= site_url() ?>" class=" sign-link">
                    Home
                </a>
                /
                <a href="<?= site_url('blog') ?>" class=" sign-link">
                    Blog
                </a>
            </span>              
        </div>
        <div class="wrapper-blog-article" id="example">
            <input type="hidden" id="site_url" value="<?= site_url() ?>"/>
            <div class="wrapper">
                <h3><?php echo $cate_name; ?></h3>
                <div class="wrapper-filter">
                    <form class="form-control-inline" @submit="search">
                        <input class="search-input" type="text" name="search" placeholder="Search articles" v-model="filter.s">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search_icon.svg" alt="">
                    </form>
                    <?php if($slug!='news-stories-and-press-releases'){ ?>
                    <div class="wrapper-option">
                        <div class="title text-16-bold">Filter by </div>
                        <div class="wrapper-select">
                            <select-custom v-if="listRegions.length"
                                :options="listRegions"
                                class="select"
                                @input="changeRegion"
                            />
                        </div>
                        <div class="wrapper-select">
                            <select-custom v-if="listEssentials.length"
                                :options="listEssentials"
                                class="select"
                                @input="changeEssential"
                            />
                        </div>
                    </div>
                    <div class="wrapper-option-mobile">
                        <button class="btn filter-mobile">
                            Filter
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter_icon.svg" alt="">
                        </button>
                        <div class="list-select">
                            <div class="wrapper-select">
                                <select @change="changeRegion">
                                    <option v-for="region in listRegions" :value="region.value">{{region.name}}</option>
                                </select> 
                            </div>
                            <div class="wrapper-select">
                                <select @change="changeEssential">
                                    <option v-for="essential in listEssentials" :value="essential.value">{{essential.name}}</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                     <?php } ?>       
                </div>

                <div class="list-item minus-m16-lr">
                    <div class="wrapper-item m16-lr" v-for="blog in listBlogs">
                        <div class="item-slide">
                            <div class="wrapper-img-slide">
                                <a :href="blog.link">
                                    <img class="img-slide" :src="blog.thumbnail" alt="">
                                </a>
                            </div>
                            <div class="description-slide">
                                <div class="date-time-slide text-12-normal">
                                    <h4>{{blog.the_date}}<br></h4>{{blog.the_time}}
                                </div>
                                <div class="info-slide">
                                    <a :href="blog.link" class="title-slide text-16-normal --fade-in">
                                        {{blog.post_title}}
                                    </a>
                                    <div class="blog-category text-14-normal">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                        <span>
                                            <span class="author-slide" >
                                                <a v-for="cate in blog.categories" :href="cate.link" class="item-cate-blog">
                                                    {{cate.name}}
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button v-if="maxPage != filter.page && listBlogs.length" class="btn-border" @click="loadMore">Load more</button>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<script>
    var vm = new Vue({
        el: '#example',
        data: function () {
            return {
                listBlogs: [],
                listCategories: [],
                listRegions: [],
                listEssentials: [],
                filter: {
                    page: 1,
                    size: 9,
                    s: '',
                    category: '<?php echo $cate_id ?>',
                    region: '',
                    essential: ''
                },
                maxPage: 2,
                siteUrl: ''
            }
        },
        created:  function () {
            this.siteUrl = document.getElementById('site_url').value;
            // this.getCategories();
            this.getBlogs();
            this.getRegions();
            this.getEssentials();
        },
        methods: {
            changeCategory: function(item) {
                if (item.target && typeof item.target.value !== 'undefined') {
                    item = this.listCategories.find(function(c) {
                        return c.value == item.target.value;
                    })
                }

                this.filter.category = item.value;
                this.getBlogs(true);
            },
            parseToText: function(encodedStr) {
                var parser = new DOMParser;
                var dom = parser.parseFromString(
                    '<!doctype html><body>' + encodedStr,
                    'text/html');
                var decodedString = dom.body.textContent;
                return decodedString;
            },
            changeRegion: function(item) {
                if (item.target && typeof item.target.value !== 'undefined') {
                    item = this.listRegions.find(function(c) {
                        return c.value === item.target.value;
                    })
                }

                this.filter.region = item.value;
                this.getBlogs(true);
            },
            changeEssential: function(item) {
                if (item.target && typeof item.target.value !== 'undefined') {
                    item = this.listEssentials.find(function(c) {
                        return c.value === item.target.value;
                    })
                }

                this.filter.essential = item.value;
                this.getBlogs(true);
            },
            search: function($event) {
                $event.preventDefault();
                this.getBlogs(true);
            },
            loadMore: function() {
                this.filter.page++;
                this.getBlogs();
            },
            buildSearchQuery: function () {
                let query = new URLSearchParams(this.filter).toString(); 
                return this.siteUrl + "/wp-json/theme/v1/get-recent-posts?" + query;
            },
            getBlogs: async function (isResetPage = false) {
                if (isResetPage) {
                    this.filter.page = 1;
                    this.listBlogs = [];
                }
                const searchUrl = this.buildSearchQuery();
                const response = await fetch(searchUrl);
                const data = await response.json();
                this.maxPage = data.maxPage;
                this.listBlogs = [...this.listBlogs, ...data.data];
            },
                getCategories: async function () {
                const response = await fetch(this.siteUrl + "/wp-json/wp/v2/categories");
                const data = await response.json();
                let arrCate = [{
                    name: 'All Categories',
                    value: ''
                }];
                for (let index = 0; index < data.length; index++) {
                    arrCate.push({
                        name: this.parseToText(data[index].name),
                        value: data[index].id
                    })
                }
                this.listCategories = arrCate;
            },
            getRegions: async function () {
                const response = await fetch(this.siteUrl + "/wp-json/theme/v1/get-list-regions");
                const data = await response.json();
                this.listRegions = [{
                    name: 'All Regions',
                    value: ''
                }, ...Object.keys(data).map(function (key) {
                    return {
                        name: data[key],
                        value: key
                    }
                })];
            },
            getEssentials: async function () {
                const response = await fetch(this.siteUrl + "/wp-json/theme/v1/get-list-essentials");
                const data = await response.json();
                this.listEssentials = [{
                    name: 'All essentials',
                    value: ''
                }, ...Object.keys(data).map(function (key) {
                    return {
                        name: data[key],
                        value: key
                    }
                })];
            },
            filterArticles: async function () {
                const response = await fetch(this.siteUrl + "/wp-json/wp/v2/post?category=&region=&essential=");
                const data = await response.json();
            }
        },
        filters: {
            getDay: function(value) {
                let date = new Date(value).toDateString();
                return date.split(' ')[2];
            },
            getDate: function(value) {
                let date = new Date(value).toDateString();
                return date.split(' ')[1] + ', ' + date.split(' ')[3];
            }
        }
    })

    $('.filter-mobile').click(function () {
        $('.wrapper-option-mobile .list-select').toggleClass('hide-dropdown-filter');
    })
    
    </script>
<?php get_footer(); ?>