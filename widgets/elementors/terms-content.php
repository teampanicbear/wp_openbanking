<?php
class Elementor_TermsContent_Widget extends \Elementor\Widget_Base
{
    public function get_title()
    {
        return 'TermsContent';
    }

    public function get_name()
    {
        return 'TermsContent';
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
                'label' => __('Content', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<div class="wrapper-content">
                                    <h5 class="title">This is a heading</h5>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ipsum amet semper risus mauris malesuada sit. Sed libero vitae lectus id interdum urna in. Sed amet, a dolor senectus. Quam senectus augue sit lacus, urna sit sed pretium. Lacus, vulputate tincidunt felis donec pulvinar suscipit nisl. Sagittis amet dolor ac nam semper vitae consectetur. Lorem in proin eget a duis sed semper dictumst tellus. Maecenas tellus amet urna, risus platea. Quam rutrum euismod bibendum egestas nunc ut. Tristique enim accumsan volutpat, faucibus donec eget.
                                    Aliquam ut vitae enim duis enim tortor, viverra eu suspendisse. Platea molestie velit, orci neque. Velit non facilisis magna mi faucibus consequat, non.
                                    Lorem massa integer pharetra id egestas ac diam posuere sed. A nunc sit at velit elit sodales. Lobortis nulla amet, mauris, faucibus in ipsum. Quam fermentum a ut vestibulum, lorem sed quis. Eget praesent donec lacus nulla egestas. Placerat neque a nulla ut volutpat. Tempus posuere ultricies eleifend scelerisque semper pulvinar integer neque dolor. Pretium mi arcu lacus, id. Porttitor suspendisse enim, rhoncus hendrerit sit eu. Interdum sit convallis lacus nunc. Et rutrum diam, justo in pretium tortor lectus. Eget sit tincidunt sed egestas libero, ac.

                                    <h5 class="title">This is a heading</h5>
                                    <p class="sub-title">This is a sub-heading</p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ipsum amet semper risus mauris malesuada sit. Sed libero vitae lectus id interdum urna in. Sed amet, a dolor senectus. Quam senectus augue sit lacus, urna sit sed pretium. Lacus, vulputate tincidunt felis donec pulvinar suscipit nisl. Sagittis amet dolor ac nam semper vitae consectetur. Lorem in proin eget a duis sed semper dictumst tellus. Maecenas tellus amet urna, risus platea. Quam rutrum euismod bibendum egestas nunc ut. Tristique enim accumsan volutpat, faucibus donec eget.
                                    Aliquam ut vitae enim duis enim tortor, viverra eu suspendisse. Platea molestie velit, orci neque. Velit non facilisis magna mi faucibus consequat, non.
                                    Lorem massa integer pharetra id egestas ac diam posuere sed. A nunc sit at velit elit sodales. Lobortis nulla amet, mauris, faucibus in ipsum. Quam fermentum a ut vestibulum, lorem sed quis. Eget praesent donec lacus nulla egestas. Placerat neque a nulla ut volutpat. Tempus posuere ultricies eleifend scelerisque semper pulvinar integer neque dolor. Pretium mi arcu lacus, id. Porttitor suspendisse enim, rhoncus hendrerit sit eu. Interdum sit convallis lacus nunc. Et rutrum diam, justo in pretium tortor lectus. Eget sit tincidunt sed egestas libero, ac.
                                
                                    <p class="sub-title">This is a sub-heading</p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ipsum amet semper risus mauris malesuada sit. Sed libero vitae lectus id interdum urna in. Sed amet, a dolor senectus. Quam senectus augue sit lacus, urna sit sed pretium. Lacus, vulputate tincidunt felis donec pulvinar suscipit nisl. Sagittis amet dolor ac nam semper vitae consectetur. Lorem in proin eget a duis sed semper dictumst tellus. Maecenas tellus amet urna, risus platea. Quam rutrum euismod bibendum egestas nunc ut. Tristique enim accumsan volutpat, faucibus donec eget.
                                    Aliquam ut vitae enim duis enim tortor, viverra eu suspendisse. Platea molestie velit, orci neque. Velit non facilisis magna mi faucibus consequat, non.
                                    Lorem massa integer pharetra id egestas ac diam posuere sed. A nunc sit at velit elit sodales. Lobortis nulla amet, mauris, faucibus in ipsum. Quam fermentum a ut vestibulum, lorem sed quis. Eget praesent donec lacus nulla egestas. Placerat neque a nulla ut volutpat. Tempus posuere ultricies eleifend scelerisque semper pulvinar integer neque dolor. Pretium mi arcu lacus, id. Porttitor suspendisse enim, rhoncus hendrerit sit eu. Interdum sit convallis lacus nunc. Et rutrum diam, justo in pretium tortor lectus. Eget sit tincidunt sed egestas libero, ac.
                                
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ipsum amet semper risus mauris malesuada sit. Sed libero vitae lectus id interdum urna in. Sed amet, a dolor senectus. Quam senectus augue sit lacus, urna sit sed pretium. Lacus, vulputate tincidunt felis donec pulvinar suscipit nisl. Sagittis amet dolor ac nam semper vitae consectetur. Lorem in proin eget a duis sed semper dictumst tellus. Maecenas tellus amet urna, risus platea. Quam rutrum euismod bibendum egestas nunc ut. Tristique enim accumsan volutpat, faucibus donec eget.
                                    Aliquam ut vitae enim duis enim tortor, viverra eu suspendisse. Platea molestie velit, orci neque. Velit non facilisis magna mi faucibus consequat, non.
                                    Lorem massa integer pharetra id egestas ac diam posuere sed. A nunc sit at velit elit sodales. Lobortis nulla amet, mauris, faucibus in ipsum. Quam fermentum a ut vestibulum, lorem sed quis. Eget praesent donec lacus nulla egestas. Placerat neque a nulla ut volutpat. Tempus posuere ultricies eleifend scelerisque semper pulvinar integer neque dolor. Pretium mi arcu lacus, id. Porttitor suspendisse enim, rhoncus hendrerit sit eu. Interdum sit convallis lacus nunc. Et rutrum diam, justo in pretium tortor lectus. Eget sit tincidunt sed egestas libero, ac.
                                </div>', 'plugin-name'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
        <div class="wrapper-terms-content">
            <!-- <div class="bottom-banner"></div> -->
            <div class="wrapper">
                <?= $settings['content'] ?>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
