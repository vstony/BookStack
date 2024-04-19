<?php
/**
 * Settings text strings
 * Contains all text strings used in the general settings sections of BookStack
 * including users and roles.
 */
return [

    // Common Messages
    'settings' => 'Sozlamalar',
    'settings_save' => 'Sozlamalarni saqlash',
    'system_version' => 'Tizim versiyasi',
    'categories' => 'Kategoriyalar',

    // App Settings
    'app_customization' => 'Moslashtirish',
    'app_features_security' => 'Xususiyatlar va xavfsizlik',
    'app_name' => 'Ilova nomi',
    'app_name_desc' => 'Ushbu nom sarlavhada va tizim tomonidan yuborilgan har qanday elektron pochta xabarlarida ko\'rsatilgan.',
    'app_name_header' => 'Sarlavhada nomni ko\'rsatish',
    'app_public_access' => 'Umumiy foydalanish imkoniyati',
    'app_public_access_desc' => 'Ushbu parametr yoqilsa, tizimga kirmagan tashrif buyuruvchilarga BookStack nusxangiz tarkibiga kirishga ruxsat beriladi.',
    'app_public_access_desc_guest' => 'Ommaviy tashrif buyuruvchilar uchun kirishni "Mehmon" foydalanuvchisi orqali boshqarish mumkin.',
    'app_public_access_toggle' => 'Umumiy foydalanishga ruxsat bering',
    'app_public_viewing' => 'Hammaga ochiq koʻrishga ruxsat berilsinmi?',
    'app_secure_images' => 'Yuqori darajadagi xavfsizlik tasvirini yuklash',
    'app_secure_images_toggle' => 'Yuqori darajadagi xavfsizlik tasvirini yuklashni yoqing',
    'app_secure_images_desc' => 'Ishlash sabablariga ko\'ra, barcha tasvirlar ommaviydir. Ushbu parametr tasvir URL manzillari oldiga tasodifiy, taxmin qilish qiyin bo\'lgan qatorni qo\'shadi. Oson kirishni oldini olish uchun katalog indekslari yoqilmaganligiga ishonch hosil qiling.',
    'app_default_editor' => 'Standart sahifa muharriri',
    'app_default_editor_desc' => 'Yangi sahifalarni tahrirlashda sukut bo\'yicha qaysi muharrir ishlatilishini tanlang. Bu ruxsatlar ruxsat etilgan sahifa darajasida bekor qilinishi mumkin.',
    'app_custom_html' => 'Maxsus HTML bosh tarkibi',
    'app_custom_html_desc' => 'Bu yerga qo\'shilgan har qanday kontent har bir sahifaning <head> bo\'limining pastki qismiga kiritiladi. Bu uslublarni bekor qilish yoki analitik kodni qo\'shish uchun qulay.',
    'app_custom_html_disabled_notice' => 'Har qanday buzilgan oʻzgarishlarni qaytarib olish uchun maxsus HTML bosh kontenti ushbu sozlamalar sahifasida oʻchirib qoʻyilgan.',
    'app_logo' => 'Ilova logotipi',
    'app_logo_desc' => 'Bu boshqa sohalar qatorida dastur sarlavhasi satrida ishlatiladi. Ushbu rasm balandligi 86px bo\'lishi kerak. Katta tasvirlar kichraytiriladi.',
    'app_icon' => 'Ilova belgisi',
    'app_icon_desc' => 'Ushbu belgi brauzer yorliqlari va yorliqlar uchun ishlatiladi. Bu 256px kvadrat PNG tasvir bo\'lishi kerak.',
    'app_homepage' => 'Ilova bosh sahifasi',
    'app_homepage_desc' => 'Bosh sahifada standart koʻrinish oʻrniga koʻrsatish uchun koʻrinishni tanlang. Tanlangan sahifalar uchun sahifa ruxsatnomalari hisobga olinmaydi.',
    'app_homepage_select' => 'Sahifani tanlang',
    'app_footer_links' => 'Altbilgi havolalari',
    'app_footer_links_desc' => 'Sayt altbilgisida ko\'rsatish uchun havolalarni qo\'shing. Ular ko\'pchilik sahifalarning pastki qismida, jumladan, kirishni talab qilmaydigan sahifalarda ko\'rsatiladi. Tizim tomonidan belgilangan tarjimalardan foydalanish uchun "trans::<key>" yorlig\'idan foydalanishingiz mumkin. Masalan: "trans::common.privacy_policy" dan foydalanish "Maxfiylik siyosati" tarjima qilingan matnni va "trans::common.terms_of_service" tarjima qilingan "Xizmat shartlari" matnini taqdim etadi.',
    'app_footer_links_label' => 'Havola yorlig\'i',
    'app_footer_links_url' => 'Havola URL',
    'app_footer_links_add' => 'Altbilgi havolasini qo\'shing',
    'app_disable_comments' => 'Fikrlarni o‘chirib qo‘yish',
    'app_disable_comments_toggle' => 'Fikrlarni o\'chirib qo\'ying',
    'app_disable_comments_desc' => 'Ilovaning barcha sahifalarida sharhlarni o\'chirib qo\'yadi. <br> Mavjud sharhlar ko\'rsatilmaydi.',

    // Color settings
    'color_scheme' => 'Ilova rang sxemasi',
    'color_scheme_desc' => 'Ilova foydalanuvchi interfeysida foydalanish uchun ranglarni o\'rnating. Mavzuga eng mos kelishi va tushunarliligini ta\'minlash uchun ranglar qorong\'u va yorug\'lik rejimlari uchun alohida sozlanishi mumkin.',
    'ui_colors_desc' => 'Ilovaning asosiy rangini va standart havola rangini o\'rnating. Asosiy rang asosan sarlavhali banner, tugmalar va interfeys bezaklari uchun ishlatiladi. Standart havola rangi yozma tarkibda ham, ilova interfeysida ham matnga asoslangan havolalar va harakatlar uchun ishlatiladi.',
    'app_color' => 'Asosiy rang',
    'link_color' => 'Standart havola rangi',
    'content_colors_desc' => 'Sahifani tashkil etish ierarxiyasidagi barcha elementlar uchun ranglarni o\'rnating. O\'qish uchun standart ranglarga o\'xshash yorqinlikdagi ranglarni tanlash tavsiya etiladi.',
    'bookshelf_color' => 'Raf rangi',
    'book_color' => 'Kitob rangi',
    'chapter_color' => 'Bo\'lim rangi',
    'page_color' => 'Sahifa rangi',
    'page_draft_color' => 'Sahifa qoralama rangi',

    // Registration Settings
    'reg_settings' => 'Roʻyxatdan oʻtish',
    'reg_enable' => 'Ro‘yxatdan o‘tishni yoqing',
    'reg_enable_toggle' => 'Ro‘yxatdan o‘tishni yoqish',
    'reg_enable_desc' => 'Ro\'yxatdan o\'tish yoqilganda, foydalanuvchi o\'zini dastur foydalanuvchisi sifatida ro\'yxatdan o\'tkazishi mumkin bo\'ladi. Roʻyxatdan oʻtgandan soʻng ularga yagona, standart foydalanuvchi roli beriladi.',
    'reg_default_role' => 'Ro\'yxatdan o\'tgandan keyin standart foydalanuvchi roli',
    'reg_enable_external_warning' => 'Tashqi LDAP yoki SAML autentifikatsiyasi faol bo\'lganda yuqoridagi parametr e\'tiborga olinmaydi. Mavjud bo\'lmagan a\'zolar uchun foydalanuvchi hisoblari, agar foydalanilayotgan tashqi tizimga qarshi autentifikatsiya muvaffaqiyatli bo\'lsa, avtomatik yaratiladi.',
    'reg_email_confirmation' => 'Elektron pochtani tasdiqlash',
    'reg_email_confirmation_toggle' => 'Elektron pochta orqali tasdiqlashni talab qiling',
    'reg_confirm_email_desc' => 'Agar domen cheklovi ishlatilsa, elektron pochta orqali tasdiqlash talab qilinadi va bu parametr e\'tiborga olinmaydi.',
    'reg_confirm_restrict_domain' => 'Domenni cheklash',
    'reg_confirm_restrict_domain_desc' => 'Roʻyxatdan oʻtishni cheklamoqchi boʻlgan elektron pochta domenlarining vergul bilan ajratilgan roʻyxatini kiriting. Ilova bilan ishlashga ruxsat berishdan oldin foydalanuvchilarga manzillarini tasdiqlash uchun elektron pochta xabari yuboriladi. <br> E\'tibor bering, foydalanuvchilar muvaffaqiyatli ro\'yxatdan o\'tgandan so\'ng elektron pochta manzillarini o\'zgartirishi mumkin.',
    'reg_confirm_restrict_domain_placeholder' => 'Cheklov oʻrnatilmagan',

    // Maintenance settings
    'maint' => 'Xizmat',
    'maint_image_cleanup' => 'Tasvirlarni tozalash',
    'maint_image_cleanup_desc' => 'Qaysi rasm va chizmalardan foydalanilayotganini va qaysi rasmlar ortiqcha ekanligini tekshirish uchun sahifa va tahrir tarkibini skanerlaydi. Buni ishga tushirishdan oldin to\'liq ma\'lumotlar bazasi va rasmning zaxira nusxasini yaratganingizga ishonch hosil qiling.',
    'maint_delete_images_only_in_revisions' => 'Faqat eski sahifa tahrirlarida mavjud bo\'lgan rasmlarni ham o\'chiring',
    'maint_image_cleanup_run' => 'Tozalashni ishga tushiring',
    'maint_image_cleanup_warning' => ':potentsial foydalanilmagan rasmlar soni topildi. Haqiqatan ham bu rasmlarni oʻchirib tashlamoqchimisiz?',
    'maint_image_cleanup_success' => ':topilgan va oʻchirilgan potentsial foydalanilmagan rasmlarni hisoblang!',
    'maint_image_cleanup_nothing_found' => 'Foydalanilmayotgan rasmlar topilmadi, hech narsa o\'chirilmadi!',
    'maint_send_test_email' => 'Test elektron pochta xabarini yuboring',
    'maint_send_test_email_desc' => 'Bu sizning profilingizda ko\'rsatilgan elektron pochta manzilingizga test elektron pochta xabarini yuboradi.',
    'maint_send_test_email_run' => 'Test elektron pochta xabarini yuboring',
    'maint_send_test_email_success' => 'Elektron pochta manzili: manzilga yuborildi',
    'maint_send_test_email_mail_subject' => 'Test elektron pochta',
    'maint_send_test_email_mail_greeting' => 'Elektron pochta orqali yetkazib berish ishlayotganga o‘xshaydi!',
    'maint_send_test_email_mail_text' => 'Tabriklaymiz! Ushbu e-pochta xabarnomasini olganingizdan so\'ng, sizning elektron pochta sozlamalaringiz to\'g\'ri sozlanganga o\'xshaydi.',
    'maint_recycle_bin_desc' => 'O\'chirilgan javonlar, kitoblar, boblar va sahifalar qayta tiklanishi yoki butunlay o\'chirilishi uchun axlat qutisiga yuboriladi. Chiqindi qutisidagi eski narsalar tizim konfiguratsiyasiga qarab bir muncha vaqt o\'tgach avtomatik ravishda olib tashlanishi mumkin.',
    'maint_recycle_bin_open' => 'Chiqindi qutisini oching',
    'maint_regen_references' => 'Ma\'lumotnomalarni qayta tiklash',
    'maint_regen_references_desc' => 'Ushbu harakat ma\'lumotlar bazasida o\'zaro mos yozuvlar indeksini qayta quradi. Bu odatda avtomatik tarzda amalga oshiriladi, ammo bu amal eski tarkibni yoki norasmiy usullar orqali qo\'shilgan tarkibni indekslash uchun foydali bo\'lishi mumkin.',
    'maint_regen_references_success' => 'Malumot indeksi qayta tiklandi!',
    'maint_timeout_command_note' => 'Eslatma: Ushbu amalni bajarish uchun vaqt kerak bo\'lishi mumkin, bu esa ba\'zi veb-muhitlarda vaqt tugashiga olib kelishi mumkin. Shu bilan bir qatorda, bu harakat terminal buyrug\'i yordamida amalga oshiriladi.',

    // Recycle Bin
    'recycle_bin' => 'Chiqindi qutisi',
    'recycle_bin_desc' => 'Bu erda siz o\'chirilgan narsalarni qayta tiklashingiz yoki ularni tizimdan butunlay olib tashlashni tanlashingiz mumkin. Ruxsat filtrlari qo\'llaniladigan tizimdagi o\'xshash harakatlar ro\'yxatidan farqli o\'laroq, bu ro\'yxat filtrlanmagan.',
    'recycle_bin_deleted_item' => 'O\'chirilgan element',
    'recycle_bin_deleted_parent' => 'Ota-ona',
    'recycle_bin_deleted_by' => 'tomonidan oʻchirilgan',
    'recycle_bin_deleted_at' => 'O\'chirish vaqti',
    'recycle_bin_permanently_delete' => 'Doimiy o\'chirish',
    'recycle_bin_restore' => 'Qayta tiklash',
    'recycle_bin_contents_empty' => 'Qayta ishlash qutisi hozir bo\'sh',
    'recycle_bin_empty' => 'Chiqindi qutisini bo\'shatish',
    'recycle_bin_empty_confirm' => 'Bu axlat qutisidagi barcha narsalarni, shu jumladan har bir element ichidagi kontentni butunlay yo\'q qiladi. Chiqindi qutisini bo\'shatishga ishonchingiz komilmi?',
    'recycle_bin_destroy_confirm' => 'This action will permanently delete this item from the system, along with any child elements listed below, and you will not be able to restore this content. Are you sure you want to permanently delete this item?',
    'recycle_bin_destroy_list' => 'Yo\'q qilinishi kerak bo\'lgan narsalar',
    'recycle_bin_restore_list' => 'Qayta tiklanadigan narsalar',
    'recycle_bin_restore_confirm' => 'Bu amal oʻchirilgan elementni, shu jumladan har qanday yordamchi elementlarni asl joyiga tiklaydi. Agar asl joy o\'chirilgan bo\'lsa va hozir axlat qutisida bo\'lsa, asosiy element ham tiklanishi kerak bo\'ladi.',
    'recycle_bin_restore_deleted_parent' => 'Bu elementning ota-onasi ham oʻchirib tashlangan. Ular ota-ona ham tiklanmaguncha oʻchirib tashlanadi.',
    'recycle_bin_restore_parent' => 'Ota-onani tiklash',
    'recycle_bin_destroy_notification' => 'Oʻchirildi: axlat qutisidan jami elementlarni sanash.',
    'recycle_bin_restore_notification' => 'Qayta tiklandi: axlat qutisidagi jami narsalarni sanash.',

    // Audit Log
    'audit' => 'Audit jurnali',
    'audit_desc' => 'Ushbu audit jurnali tizimda kuzatilgan harakatlar ro\'yxatini ko\'rsatadi. Ruxsat filtrlari qo\'llaniladigan tizimdagi o\'xshash harakatlar ro\'yxatidan farqli o\'laroq, bu ro\'yxat filtrlanmagan.',
    'audit_event_filter' => 'Voqea filtri',
    'audit_event_filter_no_filter' => 'Filtr yo\'q',
    'audit_deleted_item' => 'O\'chirilgan element',
    'audit_deleted_item_name' => 'Ism: :ism',
    'audit_table_user' => 'Foydalanuvchi',
    'audit_table_event' => 'Tadbir',
    'audit_table_related' => 'Tegishli element yoki tafsilotlar',
    'audit_table_ip' => 'IP manzili',
    'audit_table_date' => 'Faoliyat sanasi',
    'audit_date_from' => 'Sana diapazoni boshlab',
    'audit_date_to' => 'Sana oraligʻi',

    // Role Settings
    'roles' => 'Rollar',
    'role_user_roles' => 'Foydalanuvchi rollari',
    'roles_index_desc' => 'Rollar foydalanuvchilarni guruhlash va ularning a\'zolariga tizim ruxsatini berish uchun ishlatiladi. Agar foydalanuvchi bir nechta rollarning a\'zosi bo\'lsa, berilgan imtiyozlar to\'planadi va foydalanuvchi barcha qobiliyatlarni meros qilib oladi.',
    'roles_x_users_assigned' => ': tayinlangan foydalanuvchini hisoblash|: tayinlangan foydalanuvchilarni hisoblash',
    'roles_x_permissions_provided' => ':count ruxsati|:ruxsat soni',
    'roles_assigned_users' => 'Belgilangan foydalanuvchilar',
    'roles_permissions_provided' => 'Taqdim etilgan ruxsatnomalar',
    'role_create' => 'Yangi rol yaratish',
    'role_delete' => 'Rolni o\'chirish',
    'role_delete_confirm' => 'Bu \':roleName\' nomli rolni o\'chirib tashlaydi.',
    'role_delete_users_assigned' => 'Bu rolga :userCount foydalanuvchilari tayinlangan. Agar siz ushbu roldan foydalanuvchilarni koʻchirmoqchi boʻlsangiz, quyida yangi rolni tanlang.',
    'role_delete_no_migration' => "Don\\'t migrate users",
    'role_delete_sure' => 'Haqiqatan ham bu rolni oʻchirib tashlamoqchimisiz?',
    'role_edit' => 'Rolni tahrirlash',
    'role_details' => 'Rol tafsilotlari',
    'role_name' => 'Rol nomi',
    'role_desc' => 'Rolning qisqacha tavsifi',
    'role_mfa_enforced' => 'Ko\'p faktorli autentifikatsiyani talab qiladi',
    'role_external_auth_id' => 'Tashqi autentifikatsiya identifikatorlari',
    'role_system' => 'Tizim ruxsatnomalari',
    'role_manage_users' => 'Foydalanuvchilarni boshqarish',
    'role_manage_roles' => 'Rol va rol ruxsatnomalarini boshqaring',
    'role_manage_entity_permissions' => 'Barcha kitob, bob va sahifa ruxsatlarini boshqaring',
    'role_manage_own_entity_permissions' => 'Shaxsiy kitob, bob va sahifalar uchun ruxsatlarni boshqaring',
    'role_manage_page_templates' => 'Sahifa shablonlarini boshqarish',
    'role_access_api' => 'Kirish tizimi API',
    'role_manage_settings' => 'Ilova sozlamalarini boshqaring',
    'role_export_content' => 'Kontentni eksport qilish',
    'role_editor_change' => 'Sahifa muharririni o\'zgartirish',
    'role_notifications' => 'Bildirishnomalarni qabul qilish va boshqarish',
    'role_asset' => 'Obyektga ruxsatlar',
    'roles_system_warning' => 'Shuni yodda tutingki, yuqoridagi uchta ruxsatdan birortasiga kirish foydalanuvchiga o\'z imtiyozlarini yoki tizimdagi boshqalarning imtiyozlarini o\'zgartirishi mumkin. Ishonchli foydalanuvchilarga faqat ushbu ruxsatlarga ega rollarni tayinlang.',
    'role_asset_desc' => 'Bu ruxsatlar tizim ichidagi aktivlarga standart kirishni nazorat qiladi. Kitoblar, boblar va sahifalardagi ruxsatlar bu ruxsatlarni bekor qiladi.',
    'role_asset_admins' => 'Administratorlarga avtomatik ravishda barcha kontentga kirish huquqi beriladi, lekin bu parametrlar UI parametrlarini koʻrsatishi yoki yashirishi mumkin.',
    'role_asset_image_view_note' => 'Bu tasvir menejeridagi ko\'rinishga tegishli. Yuklangan rasm fayllariga haqiqiy kirish tizim tasvirini saqlash opsiyasiga bog\'liq bo\'ladi.',
    'role_all' => 'Hammasi',
    'role_own' => 'Shaxsiy',
    'role_controlled_by_asset' => 'Ular yuklangan obyekt tomonidan nazorat qilinadi',
    'role_save' => 'Rolni saqlash',
    'role_users' => 'Ushbu roldagi foydalanuvchilar',
    'role_users_none' => 'Hozirda bu rolga hech qanday foydalanuvchi tayinlanmagan',

    // Users
    'users' => 'Foydalanuvchilar',
    'users_index_desc' => 'Tizimda individual foydalanuvchi hisoblarini yarating va boshqaring. Foydalanuvchi hisoblari tizimga kirish va kontent va faoliyat atributi uchun ishlatiladi. Kirish ruxsatlari asosan rolga asoslangan, lekin foydalanuvchi kontentiga egalik, boshqa omillar qatori, ruxsat va kirishga ham ta\'sir qilishi mumkin.',
    'user_profile' => 'Foydalanuvchi profili',
    'users_add_new' => 'Yangi foydalanuvchi qo\'shish',
    'users_search' => 'Foydalanuvchilarni qidirish',
    'users_latest_activity' => 'Oxirgi faoliyat',
    'users_details' => 'Foydalanuvchi tafsilotlari',
    'users_details_desc' => 'Ushbu foydalanuvchi uchun ko\'rsatiladigan nom va elektron pochta manzilini o\'rnating. Elektron pochta manzili ilovaga kirish uchun ishlatiladi.',
    'users_details_desc_no_email' => 'Bu foydalanuvchini boshqalar tanib olishi uchun ko‘rsatiladigan nomni o‘rnating.',
    'users_role' => 'Foydalanuvchi rollari',
    'users_role_desc' => 'Ushbu foydalanuvchi qaysi rollarga tayinlanishini tanlang. Agar foydalanuvchi bir nechta rollarga tayinlangan bo\'lsa, bu rollarning ruxsatlari yig\'iladi va ular tayinlangan rollarning barcha qobiliyatlarini oladi.',
    'users_password' => 'Foydalanuvchi paroli',
    'users_password_desc' => 'Ilovaga kirish uchun ishlatiladigan parolni o\'rnating. Bu kamida 8 ta belgidan iborat boʻlishi kerak.',
    'users_send_invite_text' => 'Siz ushbu foydalanuvchiga oʻz parolini oʻrnatishga imkon beruvchi taklif e-pochtasini yuborishni tanlashingiz mumkin, aks holda uning parolini oʻzingiz belgilashingiz mumkin.',
    'users_send_invite_option' => 'Foydalanuvchi taklifnomasini elektron pochta orqali yuboring',
    'users_external_auth_id' => 'Tashqi autentifikatsiya identifikatori',
    'users_external_auth_id_desc' => 'When an external authentication system is in use (such as SAML2, OIDC or LDAP) this is the ID which links this BookStack user to the authentication system account. You can ignore this field if using the default email-based authentication.',
    'users_password_warning' => 'Only fill the below if you would like to change the password for this user.',
    'users_system_public' => 'Bu foydalanuvchi sizning misolingizga tashrif buyurgan har qanday mehmon foydalanuvchilarini ifodalaydi. U tizimga kirish uchun ishlatilmaydi, lekin avtomatik ravishda tayinlanadi.',
    'users_delete' => 'Foydalanuvchini oʻchirish',
    'users_delete_named' => 'Foydalanuvchini o\'chirish :userName',
    'users_delete_warning' => 'Bu \':userName\' nomli foydalanuvchini tizimdan butunlay o\'chirib tashlaydi.',
    'users_delete_confirm' => 'Bu foydalanuvchini oʻchirib tashlamoqchimisiz?',
    'users_migrate_ownership' => 'Egalikni ko‘chirish',
    'users_migrate_ownership_desc' => 'Agar boshqa foydalanuvchi ushbu foydalanuvchiga tegishli barcha elementlarning egasi boʻlishini istasangiz, bu yerda foydalanuvchini tanlang.',
    'users_none_selected' => 'Hech qanday foydalanuvchi tanlanmagan',
    'users_edit' => 'Foydalanuvchini tahrirlash',
    'users_edit_profile' => 'Profilni tahrirlash',
    'users_avatar' => 'Foydalanuvchi avatar',
    'users_avatar_desc' => 'Ushbu foydalanuvchini ifodalash uchun rasmni tanlang. Bu taxminan 256px kvadrat bo\'lishi kerak.',
    'users_preferred_language' => 'Afzal til',
    'users_preferred_language_desc' => 'Ushbu parametr ilovaning foydalanuvchi interfeysi uchun ishlatiladigan tilni o\'zgartiradi. Bu foydalanuvchi tomonidan yaratilgan kontentga ta\'sir qilmaydi.',
    'users_social_accounts' => 'Ijtimoiy hisoblar',
    'users_social_accounts_desc' => 'View the status of the connected social accounts for this user. Social accounts can be used in addition to the primary authentication system for system access.',
    'users_social_accounts_info' => 'Bu yerda siz tezroq va osonroq kirish uchun boshqa hisoblaringizni ulashingiz mumkin. Bu yerda hisobni uzish avval ruxsat berilgan ruxsatni bekor qilmaydi. Ulangan ijtimoiy hisob qaydnomangizdagi profil sozlamalaringizdan kirishni bekor qiling.',
    'users_social_connect' => 'Hisobni ulash',
    'users_social_disconnect' => 'Hisobni o\'chirish',
    'users_social_status_connected' => 'Connected',
    'users_social_status_disconnected' => 'Disconnected',
    'users_social_connected' => ':socialAccount hisobi profilingizga muvaffaqiyatli biriktirildi.',
    'users_social_disconnected' => ':socialAccount hisobi profilingizdan muvaffaqiyatli uzildi.',
    'users_api_tokens' => 'API tokenlari',
    'users_api_tokens_desc' => 'Create and manage the access tokens used to authenticate with the BookStack REST API. Permissions for the API are managed via the user that the token belongs to.',
    'users_api_tokens_none' => 'Bu foydalanuvchi uchun API tokenlari yaratilmagan',
    'users_api_tokens_create' => 'Token yaratish',
    'users_api_tokens_expires' => 'Muddati tugaydi',
    'users_api_tokens_docs' => 'API hujjatlari',
    'users_mfa' => 'Ko\'p faktorli autentifikatsiya',
    'users_mfa_desc' => 'Ko\'p faktorli autentifikatsiyani foydalanuvchi hisobingiz uchun qo\'shimcha xavfsizlik qatlami sifatida o\'rnating.',
    'users_mfa_x_methods' => ':count usuli tuzilgan|:count usullari sozlangan',
    'users_mfa_configure' => 'Usullarni sozlash',

    // API Tokens
    'user_api_token_create' => 'API tokenini yarating',
    'user_api_token_name' => 'Ism',
    'user_api_token_name_desc' => 'Belgilangan maqsadni kelajakda eslatish uchun o\'qilishi mumkin bo\'lgan nom bering.',
    'user_api_token_expiry' => 'Quyidagi sanagacha foydalanilsin',
    'user_api_token_expiry_desc' => 'Ushbu tokenning amal qilish muddati tugash sanasini belgilang. Bu sanadan keyin ushbu token yordamida qilingan soʻrovlar ishlamaydi. Bu maydonni boʻsh qoldirish kelajakda 100 yil oʻtib muddatini belgilaydi.',
    'user_api_token_create_secret_message' => 'Ushbu token yaratilgandan so\'ng darhol "Token ID" va "Token Secret" yaratiladi va ko\'rsatiladi. Sir faqat bir marta ko\'rsatiladi, shuning uchun davom etishdan oldin qiymatni xavfsiz va xavfsiz joyga nusxalashni unutmang.',
    'user_api_token' => 'API tokeni',
    'user_api_token_id' => 'Token ID',
    'user_api_token_id_desc' => 'Bu token uchun tahrir qilib boʻlmaydigan tizim tomonidan yaratilgan identifikator boʻlib, API soʻrovlarida taqdim etilishi kerak.',
    'user_api_token_secret' => 'Token siri',
    'user_api_token_secret_desc' => 'Bu API so\'rovlarida taqdim etilishi kerak bo\'lgan ushbu token uchun yaratilgan tizim siridir. Bu faqat bir marta ko\'rsatiladi, shuning uchun bu qiymatni xavfsiz va xavfsiz joyga nusxalang.',
    'user_api_token_created' => 'Token yaratilgan: timeAgo',
    'user_api_token_updated' => 'Token yangilandi: timeAgo',
    'user_api_token_delete' => 'Tokenni oʻchirish',
    'user_api_token_delete_warning' => 'Bu \':tokenName\' nomli ushbu API tokenini tizimdan butunlay oʻchirib tashlaydi.',
    'user_api_token_delete_confirm' => 'Haqiqatan ham ushbu API tokenini oʻchirib tashlamoqchimisiz?',

    // Webhooks
    'webhooks' => 'Webhuklar',
    'webhooks_index_desc' => 'Veb-huklar tizim ichida ma\'lum harakatlar va hodisalar sodir bo\'lganda tashqi URL manzillariga ma\'lumotlarni yuborish usuli bo\'lib, xabar almashish yoki bildirishnoma tizimlari kabi tashqi platformalar bilan voqealarga asoslangan integratsiyani ta\'minlaydi.',
    'webhooks_x_trigger_events' => ':count trigger hodisasi|: count trigger voqealari',
    'webhooks_create' => 'Yangi Webhook yaratish',
    'webhooks_none_created' => 'Hali hech qanday vebhuk yaratilmagan.',
    'webhooks_edit' => 'Webhook-ni tahrirlash',
    'webhooks_save' => 'Webhook-ni saqlang',
    'webhooks_details' => 'Webhook tafsilotlari',
    'webhooks_details_desc' => 'Webhook ma\'lumotlari yuboriladigan joy sifatida foydalanuvchiga qulay nom va POST so\'nggi nuqtasini taqdim eting.',
    'webhooks_events' => 'Webhook voqealari',
    'webhooks_events_desc' => 'Ushbu veb-hukni chaqirishi kerak bo\'lgan barcha hodisalarni tanlang.',
    'webhooks_events_warning' => 'Shuni esda tutingki, bu hodisalar, hatto maxsus ruxsatlar qo\'llanilsa ham, tanlangan barcha hodisalar uchun ishga tushadi. Ushbu vebhukdan foydalanish maxfiy kontentni oshkor qilmasligiga ishonch hosil qiling.',
    'webhooks_events_all' => 'Barcha tizim hodisalari',
    'webhooks_name' => 'Webhook nomi',
    'webhooks_timeout' => 'Webhook so\'rovining kutish vaqti (soniyalar)',
    'webhooks_endpoint' => 'Webhook oxirgi nuqtasi',
    'webhooks_active' => 'Webhook faol',
    'webhook_events_table_header' => 'Voqealar',
    'webhooks_delete' => 'Webhook-ni o\'chirish',
    'webhooks_delete_warning' => 'Bu \':webhookName\' nomli ushbu vebhukni tizimdan butunlay o\'chirib tashlaydi.',
    'webhooks_delete_confirm' => 'Haqiqatan ham bu vebhukni oʻchirib tashlamoqchimisiz?',
    'webhooks_format_example' => 'Webhook formatiga misol',
    'webhooks_format_example_desc' => 'Webhook maʼlumotlari POST soʻrovi sifatida sozlangan soʻnggi nuqtaga quyidagi formatga muvofiq JSON sifatida yuboriladi. "Related_item" va "url" xususiyatlari ixtiyoriy va ishga tushirilgan hodisa turiga bog\'liq bo\'ladi.',
    'webhooks_status' => 'Webhook holati',
    'webhooks_last_called' => 'Oxirgi qo\'ng\'iroq:',
    'webhooks_last_errored' => 'Oxirgi xato:',
    'webhooks_last_error_message' => 'Oxirgi xato xabari:',


    //! If editing translations files directly please ignore this in all
    //! languages apart from en. Content will be auto-copied from en.
    //!////////////////////////////////
    'language_select' => [
        'en' => 'English',
        'ar' => 'العربية',
        'bg' => 'Bǎlgarski',
        'bs' => 'Bosanski',
        'ca' => 'Català',
        'cs' => 'Česky',
        'da' => 'Dansk',
        'de' => 'Deutsch (Sie)',
        'de_informal' => 'Deutsch (Du)',
        'el' => 'ελληνικά',
        'es' => 'Español',
        'es_AR' => 'Español Argentina',
        'et' => 'Eesti keel',
        'eu' => 'Euskara',
        'fa' => 'فارسی',
        'fi' => 'Suomi',
        'fr' => 'Français',
        'he' => 'עברית',
        'hr' => 'Hrvatski',
        'hu' => 'Magyar',
        'id' => 'Bahasa Indonesia',
        'it' => 'Italian',
        'ja' => '日本語',
        'ko' => '한국어',
        'lt' => 'Lietuvių Kalba',
        'lv' => 'Latviešu Valoda',
        'nb' => 'Norsk (Bokmål)',
        'nn' => 'Nynorsk',
        'nl' => 'Nederlands',
        'pl' => 'Polski',
        'pt' => 'Português',
        'pt_BR' => 'Português do Brasil',
        'ro' => 'Română',
        'ru' => 'Русский',
        'sk' => 'Slovensky',
        'sl' => 'Slovenščina',
        'sv' => 'Svenska',
        'tr' => 'Türkçe',
        'uk' => 'Українська',
        'uz' => 'O‘zbekcha',
        'vi' => 'Tiếng Việt',
        'zh_CN' => '简体中文',
        'zh_TW' => '繁體中文',
    ],
    //!////////////////////////////////
];
