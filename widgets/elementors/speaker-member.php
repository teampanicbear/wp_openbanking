<?php
class Elementor_SpeakerMember_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'SpeakerMember';
    }

    public function get_name()
    {
        return 'SpeakerMembers';
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

        // $this->add_control(
        //     'content',
        //     [a
        //         'label' => __( 'Content', 'plugin-name' ),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __( 'Content', 'plugin-name' ),
        //     ]
        // );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-speaker-member" id='speaker'>
            <input type="hidden" id="site_url" value="<?= site_url() ?>" />
            <div class="wrapper">
                <div class="wrapper-filter">
                    <form class="form-control-inline" @submit="search">
                        <input class="search-input" type="text" name="search" placeholder="Search" v-model="filter.s">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search_icon.svg" alt="">
                    </form>
                    <div class="wrapper-option">
                        <div class="wrapper-select">
                            <select-custom v-if="listSorts.length" :options="listSorts" class="select" @input="changeSort" />
                            </select>
                        </div>
                    </div>
                </div>
                <div class="wrapper-speaker-content minus-m16-lr">
                    <div class="wrapper-item m16-lr" v-for="speaker in listSpeakers">
                        <div class="wrapper-speaker-item">
                            <a :href=speaker.link class="ava-speaker" v-bind:style="{ backgroundImage: 'url(' + speaker.thumbnail + ')' }">
                            </a>
                            <div class="position-item-content">
                                <div class="wrapper-item-content">
                                    <a :href=speaker.link class="text-20-bold header-item">{{speaker.post_title}}</a>
                                    <p class="text-14-normal">{{speaker.position}}</p>
                                    <hr />
                                    <div class="bottom-item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/office.svg" alt="">
                                        <p class="text-14-normal paragraph-item">{{speaker.company}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrapper-speaker-action">
                    <button v-if="maxPage != filter.page && listSpeakers.length" class="btn-border" @click="loadMore">Load more</button>
                </div>
            </div>
        </div>
        <script>
            var vm = new Vue({
                el: '#speaker',
                data: function() {
                    return {
                        listSpeakers: [],
                        listSorts: [{
                                name: 'Newest',
                                value: 'newest'
                            },
                            {
                                name: 'Oldest',
                                value: 'oldest'
                            },
                            {
                                name: 'A-Z',
                                value: 'az'
                            },
                            {
                                name: 'Z-A',
                                value: 'za'
                            },
                        ],
                        filter: {
                            page: 1,
                            size: 9,
                            s: '',
                            sort: ''
                        },
                        maxPage: 2,
                        siteUrl: ''
                    }
                },
                created: function() {
                    this.siteUrl = document.getElementById('site_url').value;
                    this.getSpeakers();
                },
                methods: {
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
                        this.getSpeakers(true);
                    },
                    loadMore: function() {
                        this.filter.page++;
                        this.getSpeakers();
                    },
                    buildSearchQuery: function() {
                        let query = new URLSearchParams(this.filter).toString();
                        return this.siteUrl + "/wp-json/theme/v1/get-speakers?" + query;
                    },

                    changeSort: function(item) {
                        if (item.target && typeof item.target.value !== 'undefined') {
                            item = this.listSorts.find(function(c) {
                                return c.value === item.target.value;
                            })
                        }

                        this.filter.sort = item.value;
                        this.getSpeakers(true);
                    },

                    getSpeakers: async function(isResetPage = false) {
                        if (isResetPage) {
                            this.filter.page = 1;
                            this.listSpeakers = [];
                        }
                        const searchUrl = this.buildSearchQuery();
                        const response = await fetch(searchUrl);
                        const data = await response.json();
                        this.maxPage = data.maxPage;
                        this.listSpeakers = [...this.listSpeakers, ...data.data];
                    },
                },
            })
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
