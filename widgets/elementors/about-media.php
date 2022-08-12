<?php
class Elementor_AboutMedia_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'AboutMedia';
    }

    public function get_name()
    {
        return 'AboutMedia';
    }

    public function get_categories()
    {
        return ['basic'];
    }
    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('
                                    <h5 class="sub-title">Press & Media</h5>
                                    <h2 class="main-title">News Stories <br> and Press releases</h2>
                                ', 'plugin-name' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $category = get_category_by_slug("news-stories-and-press-releases");
        $category_id = $category->term_id;
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-media" id="example">
            <input type="hidden" id="site_url" value="<?= site_url() ?>" />
            <div class="wrapper">
                <?= $settings['content'] ?>
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
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stopwatch.svg" alt="">
                                        <span class="author-slide">
                                            {{blog.post_date | getHour()}}
                                        </span>
                                        <div class="flex">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/article_black.svg" alt="">
                                            <a  v-for="cate in blog.categories" :href="cate.link"  class="author-slide tag">
                                                {{cate.name}}
                                            </a>
                                        </div>
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
                data: function() {
                    return {
                        listBlogs: [],
                        filter: {
                            page: 1,
                            size: 9,
                            category: <?php echo $category_id ?>,
                        },
                        maxPage: 2,
                        siteUrl: ''
                    }
                },
                created: function() {
                    this.siteUrl = document.getElementById('site_url').value;
                    this.getBlogs();
                },
                methods: {
                    loadMore: function() {
                        this.filter.page++;
                        this.getBlogs();
                    },
                    buildSearchQuery: function() {
                        let query = new URLSearchParams(this.filter).toString();
                        return this.siteUrl + "/wp-json/theme/v1/get-recent-posts?" + query;
                    },
                    getBlogs: async function(isResetPage = false) {
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
                },
                filters: {
                    getDay: function(value) {
                        let date = new Date(value).toDateString();
                        return date.split(' ')[2];
                    },
                    getDate: function(value) {
                        let date = new Date(value).toDateString();
                        return date.split(' ')[1] + ', ' + date.split(' ')[3];
                    },
                    getHour: function(value) {
                        let time = value.split(' ')[1]
                        return time.split(':')[0] + ':' + time.split(':')[1];
                    }
                }
            })
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
