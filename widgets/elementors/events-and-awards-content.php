<?php
class Elementor_EventsAndAwardsContent_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'EventsAndAwardsContent';
    }

    public function get_name()
    {
        return 'EventsAndAwardsContent';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // $this->add_control(
        //     'content',
        //     [
        //         'label' => __( 'Content', 'plugin-name' ),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __( 'Content', 'plugin-name' ),
        //     ]
        // );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $category = get_category_by_slug("events-and-awards");
        $category_id = $category->term_id;

//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
            <div class="wrapper-blog-article" id="example">
                <input type="hidden" id="site_url" value="<?= site_url() ?>"/>
                <div class="wrapper">
                    <h3></h3>
                    <div class="wrapper-filter">
                        <form class="form-control-inline" @submit="search">
                            <input class="search-input" type="text" name="search" placeholder="Search events" v-model="filter.s">
        					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/search_icon.svg" alt="">
                        </form>
                        <div class="wrapper-option">
                            <div class="wrapper-select">
                                <select-custom v-if="listSort.length"
                                    :options="listSort"
                                    class="select"
                                    @input="changeSort"
                                />
					            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-bottom.svg" alt="">
                            </div>
                        </div>
                        <div class="wrapper-option-mobile">
                            <button class="btn filter-mobile">
                                Filter
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter_icon.svg" alt="">
                            </button>
                            <div class="list-select">
                                <div class="wrapper-select">
                                    <select @change="changeSort">
                                        <option v-for="cate in listSort" :value="cate.value">{{cate.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                                            <span style="width: 100%">
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
            <script>
                var vm = new Vue({
                    el: '#example',
                    data: function () {
                        return {
                            listBlogs: [],
                            listSort: [],
                            filter: {
                                page: 1,
                                size: 9,
                                category: <?php echo $category_id ?>,
                                time: ''
                            },
                            maxPage: 2,
                            siteUrl: ''
                        }
                    },
                    created:  function () {
                        this.siteUrl = document.getElementById('site_url').value;
                        this.getBlogs();
                        this.getSort();
                    },
                    methods: {
                        changeSort: function(item) {
                            if (item.target && typeof item.target.value !== 'undefined') {
                                item = this.listSort.find(function(c) {
                                    return c.value == item.target.value;
                                })
                            }

                            this.filter.time = item.value;
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
                            console.log("helo = ",query);
                            return this.siteUrl + "/wp-json/theme/v1/get-recent-posts?"  + query;
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
                        getSort: async function () {
                            const response = await fetch(this.siteUrl + "/wp-json/theme/v1/get-list-times");
                            const data = await response.json();
                            let arrSort = [{
                                name: 'Filter',
                                value: ''
                            }];
                            for (let index = 0; index < data.length; index++) {
                                    arrSort.push({
                                        name: data[index].name,
                                        value: data[index].value
                                    });
                            }
                            this.listSort = arrSort;
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
        <?php
    }

    protected function _content_template() {

    }
}