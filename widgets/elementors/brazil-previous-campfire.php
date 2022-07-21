<?php
class Elementor_BrazilPreviousCampfire_Widget extends \Elementor\Widget_Base {
    public function get_title() {
        return 'BrazilPreviousCampfire';
    }

    public function get_name()
    {
        return 'BrazilPreviousCampfire';
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
//		$this->add_inline_editing_attributes( 'content', 'advanced' );
        ?>
        <div class="wrapper-previous wrapper-campfire-preview-article" id="campfire">
            <input type="hidden" id="site_url" value="<?= site_url() ?>"/>
            <div class="wrapper wrapper-blog-article">
                <!-- <div class='wrapper-heading-filter'> -->
                    <h2 class="heading-previous">Previous Campfires</h2>
                    <div class="wrapper-filter">
                        <form class="form-control-inline" @submit="search">
                            <input class="search-input" type="text" name="search" placeholder="Search" v-model="search">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search_icon.svg" alt="">
                        </form>
                        <div class="wrapper-option">
                            <div class="title text-16-bold">Filter by </div>
                            <div class="wrapper-select">
                                <select-custom v-if="listCategories.length" :options="listCategories" class="select" @input="changeCategory" />
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-bottom.svg" alt="">
                            </div>
                            <div class="wrapper-select">
                                <select-custom v-if="listRegions.length" :options="listRegions" class="select" @input="changeRegion" />
                            </div>
                            <div class="wrapper-select">
                                <select-custom v-if="listEssentials.length" :options="listEssentials" class="select" @input="changeEssential" />
                            </div>
                        </div>
                        <div class="wrapper-option-mobile">
                            <button class="btn filter-mobile">
                                Filter
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter_icon.svg" alt="">
                            </button>
                            <div class="list-select">
                                <div class="wrapper-select">
                                    <select @change="changeCategory">
                                        <!-- <option value="">All categories</option> -->
                                        <option v-for="cate in listCategories" :value="cate.value">{{cate.name}}</option>
                                    </select>
                                </div>
                                <div class="wrapper-select">
                                    <select @change="changeRegion">
                                        <!-- <option value="hide">All regions</option> -->
                                        <option v-for="region in listRegions" :value="region.value">{{region.name}}</option>
                                    </select>
                                </div>
                                <div class="wrapper-select">
                                    <select @change="changeEssential">
                                        <!-- <option value="hide">All essentials</option> -->
                                        <option v-for="essential in listEssentials" :value="essential.value">{{essential.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <div class="list-item-previous">           
                    <div class="item-previous" v-for="campfire in listCampfires">
                        <div class="thumnail-item-previous">
                            <img class="thumbnail" :src=campfire.thumbnail :alt=campfire.post_title>
                            <img class="icon-live" src="<?php echo get_template_directory_uri(); ?>/assets/images/livestream.svg" alt="">
                            <div @click='checkLogin' v-html=campfire.link_img></div>
                        </div>
                        <div class="title-item text-16-bold" @click='checkLogin' v-html=campfire.link>
                        </div>
                        <div class="date-time">
                            <img class="stopwatch" src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                            {{campfire.stopwatch}}
                            <img class="calendar" src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                            {{campfire.start_date}}
                        </div>
                    </div>
                </div>
                <button v-if="maxPage != filter.page && listCampfires.length" class="btn-border" @click="loadMore">Load more campfires</button>
            </div>
        </div>
        <script>
                var vm = new Vue({
                    el: '#campfire',
                    data: function () {
                        return {
                            listCampfires: [],
                            listCategories: [
                                { name: 'All categories', value: 'all' },
                                { name: 'Live Stream', value: 'live-stream' },
                                { name: 'Appathon', value: 'appathon' },
                                { name: 'Before Covid', value: 'before-covid' },    
                            ],
                            listRegions: [],
                            listEssentials: [],
                            search: '',
                            filter: {
                                page: 1,
                                size: 9,
                                s: '',
                                cate: '',
                                login: '<?php echo is_user_logged_in(); ?>',
                                isbrazilcampfire: '1',
                            },
                            maxPage: 2,
                            siteUrl: '',
                            timeOutSearch: null,
                        }
                    },
                    created:  function () {
                        this.siteUrl = document.getElementById('site_url').value;
                        this.getCampfires(false,false);
                        this.getRegions();
                        this.getEssentials();
                    },
                    watch: {
                        search: function (val, oldVal) {
                            this.filter.s = val;
                            this.checkTime = false;
                            const _this = this;
                            if(this.timeOutSearch) clearTimeout(this.timeOutSearch);
                            this.timeOutSearch = setTimeout( function(e) {
                                _this.getCampfires(true);
                            },500);
                        },
                    },
                    methods: {
                        checkLogin: function(e) {
                            var main_popup = $(e.target).data('target');
                            let id_campfire = $(e.target).data('id');
                            let url_campfire = $(e.target).data('url');
                            $('#wpforms-565-field_2').val(id_campfire);
                            $('#wpforms-565-field_3').val(url_campfire);
                            $(main_popup).css({
                                "visibility": "visible",
                                "opacity": 1,
                                "position": "fixed",
                                "z-index": 9999
                            })
                        },
                        parseToText: function(encodedStr) {
                            var parser = new DOMParser;
                            var dom = parser.parseFromString(
                                '<!doctype html><body>' + encodedStr,
                                'text/html');
                            var decodedString = dom.body.textContent;
                            return decodedString;
                        },
                        changeCategory: function(item) {
                            if (item.target && typeof item.target.value !== 'undefined') {
                                item = this.listCategories.find(function(c) {
                                    return c.value === item.target.value;
                                })
                            }

                            this.filter.cate = item.value;
                            this.getCampfires(true);
                        },
                        search: function($event) {
                            $event.preventDefault();
                            this.getCampfires(true);
                        },
                        loadMore: function() {
                            this.filter.page++;              
                            this.getCampfires();
                        },
                        buildSearchQuery: function () {
                            let query = new URLSearchParams(this.filter).toString(); 
                            return this.siteUrl + "/wp-json/theme/v1/get-previous-campfires?" + query;
                        },
                        getCampfires: async function (isResetPage = false,isFirstShow = true) {
                            if (isResetPage) {
                                this.filter.page = 1;
                                this.listCampfires = [];
                            }
                            if (isFirstShow) {
                                //$('#loader').show();
                            }
                            const searchUrl = this.buildSearchQuery();
                            const response = await fetch(searchUrl);
                            const data = await response.json();
                            this.maxPage = data.maxPage;
                            this.listCampfires = [...this.listCampfires, ...data.data];
                            //$('#loader').hide();
                        },
                        getRegions: async function() {
                            const response = await fetch(this.siteUrl + "/wp-json/theme/v1/get-list-campfire-regions");
                            const data = await response.json();
                            this.listRegions = [{
                                name: 'All Regions',
                                value: ''
                            }, ...Object.keys(data).map(function(key) {
                                return {
                                    name: data[key],
                                    value: key
                                }
                            })];
                        },
                        getEssentials: async function() {
                            const response = await fetch(this.siteUrl + "/wp-json/theme/v1/get-list-campfire-essentials");
                            const data = await response.json();
                            this.listEssentials = [{
                                name: 'All essentials',
                                value: ''
                            }, ...Object.keys(data).map(function(key) {
                                return {
                                    name: data[key],
                                    value: key
                                }
                            })];
                        },
                        changeRegion: function(item) {
                            if (item.target && typeof item.target.value !== 'undefined') {
                                item = this.listRegions.find(function(c) {
                                    return c.value === item.target.value;
                                })
                            }

                            this.filter.region = item.value;
                            this.getCampfires(true);
                        },
                        changeEssential: function(item) {
                            if (item.target && typeof item.target.value !== 'undefined') {
                                item = this.listEssentials.find(function(c) {
                                    return c.value === item.target.value;
                                })
                            }

                            this.filter.essential = item.value;
                            this.getCampfires(true);
                        },
                    },
                })
                
                $('.filter-mobile').click(function() {
                    $('.wrapper-option-mobile .list-select').toggleClass('hide-dropdown-filter');
                })
            </script>
        <?php
    }

    protected function _content_template() {

    }
}