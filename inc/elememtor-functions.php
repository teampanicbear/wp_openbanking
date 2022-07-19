<?php
// elementor
// Add Plugin actions
function init_elementor_widgets() {
    // Include Widget files
    $files = glob(__DIR__ . '/../widgets/elementors/*.php');

    foreach ($files as $file) {
        require_once($file);
    }
    // Register widget
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Banner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BannerImage_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Benefit_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Problem_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Appathon_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Campfire_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_LatestObeBlog_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_OurPartner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Testimonial_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SpeakerCampfire_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_UpcomingCampfire_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogCampfire_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_InsightEvent_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_InsightInformation_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_InsightIntro_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SpeakerMember_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SpeakerBecome_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SpeakerBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AboutOurValue_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AboutMeeting_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AboutMedia_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AboutOurMission_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AboutBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SpeakerDetailBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SpeakerDetailCampfire_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SpeakerDetailOther_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogPopular_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogNewsLetter_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogCategory_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogArticle_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogDetailBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogDetailContent_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlogDetailEvent_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_MyAccountEdit_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_MyAccountBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_MyAccountInfo_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PRServiceBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PRServiceContent_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PRServiceConsultant_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PRServiceBecome_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SponsorDetailBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SponsorDetailOther_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SponsorDetailBecome_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PartnerBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PartnerSidebar_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PartnerOutPackage_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PartnerBecome_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PartnerEvent_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PartnerConsultancy_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_MemberDetailBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_MemberDetailTeam_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonWealth_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonRules_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonGetStarted_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonLookOut_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonAwards_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonWinner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonTimeline_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonJudges_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AppathonMore_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_TermsBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_TermsContent_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SignUp_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_EventsAndAwardsBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_EventsAndAwardsContent_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BlockPromo_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_CreateNewPassword_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_StrategicPartner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_ConsultancyBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_ConsultancyIntro_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_ConsultancyMission_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_ConsultancyService_Widget() );

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BrazilBanner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BrazilRelevant_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BrazilConnect_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Brazil_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BrazilCampfire_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BrazilPartner_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_BrazilPreviousCampfire_Widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'init_elementor_widgets' );