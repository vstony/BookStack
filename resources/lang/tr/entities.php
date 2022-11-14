<?php
/**
 * Text used for 'Entities' (Document Structure Elements) such as
 * Books, Shelves, Chapters & Pages
 */
return [

    // Shared
    'recently_created' => 'Yakın Zamanda Oluşturuldu',
    'recently_created_pages' => 'Yakın Zamanda Oluşturulan Sayfalar',
    'recently_updated_pages' => 'Yakın Zamanda Güncellenen Sayfalar',
    'recently_created_chapters' => 'Yakın Zamanda Oluşturulan Bölümler',
    'recently_created_books' => 'Yakın Zamanda Oluşturulan Kitaplar',
    'recently_created_shelves' => 'Yakın Zamanda Oluşturulan Kitaplıklar',
    'recently_update' => 'Yakın Zamanda Güncellenmiş',
    'recently_viewed' => 'Yakın Zamanda Görüntülenmiş',
    'recent_activity' => 'Son Hareketler',
    'create_now' => 'Hemen bir tane oluştur',
    'revisions' => 'Revizyonlar',
    'meta_revision' => 'Revizyon #:revisionCount',
    'meta_created' => ':timeLength Oluşturuldu',
    'meta_created_name' => ':user tarafından :timeLength oluşturuldu',
    'meta_updated' => ':timeLength güncellendi',
    'meta_updated_name' => ':user tarafından :timeLength güncellendi',
    'meta_owned_name' => 'Owned by :user',
    'meta_reference_page_count' => 'Referenced on 1 page|Referenced on :count pages',
    'entity_select' => 'Öge Seçimi',
    'entity_select_lack_permission' => 'You don\'t have the required permissions to select this item',
    'images' => 'Görseller',
    'my_recent_drafts' => 'Son Taslaklarım',
    'my_recently_viewed' => 'Son Görüntülediklerim',
    'my_most_viewed_favourites' => 'En Çok Görüntülenen Favoriler',
    'my_favourites' => 'Favorilerim',
    'no_pages_viewed' => 'Herhangi bir sayfa görüntülemediniz',
    'no_pages_recently_created' => 'Yakın zamanda bir sayfa oluşturulmadı',
    'no_pages_recently_updated' => 'Yakın zamanda bir sayfa güncellenmedi',
    'export' => 'Dışa Aktar',
    'export_html' => 'Web Dosyası',
    'export_pdf' => 'PDF Dosyası',
    'export_text' => 'Düz Metin Dosyası',
    'export_md' => 'Markdown File',

    // Permissions and restrictions
    'permissions' => 'İzinler',
    'permissions_desc' => 'Set permissions here to override the default permissions provided by user roles.',
    'permissions_book_cascade' => 'Permissions set on books will automatically cascade to child chapters and pages, unless they have their own permissions defined.',
    'permissions_chapter_cascade' => 'Permissions set on chapters will automatically cascade to child pages, unless they have their own permissions defined.',
    'permissions_save' => 'İzinleri Kaydet',
    'permissions_owner' => 'Sahip',
    'permissions_role_everyone_else' => 'Everyone Else',
    'permissions_role_everyone_else_desc' => 'Set permissions for all roles not specifically overridden.',
    'permissions_role_override' => 'Override permissions for role',

    // Search
    'search_results' => 'Arama Sonuçları',
    'search_total_results_found' => ':count sonuç bulundu |:count toplam sonuç bulundu',
    'search_clear' => 'Aramayı Temizle',
    'search_no_pages' => 'Bu aramayla ilgili herhangi bir sayfa bulunamadı',
    'search_for_term' => ':term için Ara',
    'search_more' => 'Daha Fazla Sonuç',
    'search_advanced' => 'Gelişmiş Arama',
    'search_terms' => 'Terimleri Ara',
    'search_content_type' => 'İçerik Türü',
    'search_exact_matches' => 'Tam Eşleşmeler',
    'search_tags' => 'Etiket Aramaları',
    'search_options' => 'Ayarlar',
    'search_viewed_by_me' => 'Görüntülediklerim',
    'search_not_viewed_by_me' => 'Görüntülemediklerim',
    'search_permissions_set' => 'İzinler ayarlanmış',
    'search_created_by_me' => 'Oluşturduklarım',
    'search_updated_by_me' => 'Güncellediklerim',
    'search_owned_by_me' => 'Owned by me',
    'search_date_options' => 'Tarih Seçenekleri',
    'search_updated_before' => 'Önce güncellendi',
    'search_updated_after' => 'Sonra güncellendi',
    'search_created_before' => 'Önce oluşturuldu',
    'search_created_after' => 'Sonra oluşturuldu',
    'search_set_date' => 'Tarihi Ayarla',
    'search_update' => 'Aramayı Güncelle',

    // Shelves
    'shelf' => 'Kitaplık',
    'shelves' => 'Kitaplıklar',
    'x_shelves' => ':count Kitaplık|:count Kitaplık',
    'shelves_empty' => 'Hiç kitaplık oluşturulmamış',
    'shelves_create' => 'Yeni Kitaplık Oluştur',
    'shelves_popular' => 'Popüler Kitaplıklar',
    'shelves_new' => 'Yeni Kitaplıklar',
    'shelves_new_action' => 'Yeni Kitaplık',
    'shelves_popular_empty' => 'En popüler kitaplıklar burada görüntülenecek.',
    'shelves_new_empty' => 'En son oluşturulmuş kitaplıklar burada görüntülenecek.',
    'shelves_save' => 'Kitaplığı Kaydet',
    'shelves_books' => 'Bu kitaplıktaki kitaplar',
    'shelves_add_books' => 'Bu kitaplığa kitap ekle',
    'shelves_drag_books' => 'Drag books below to add them to this shelf',
    'shelves_empty_contents' => 'Bu kitaplıkta hiç kitap bulunamadı',
    'shelves_edit_and_assign' => 'Kitap eklemek için kitaplığı düzenleyin',
    'shelves_edit_named' => 'Edit Shelf :name',
    'shelves_edit' => 'Edit Shelf',
    'shelves_delete' => 'Delete Shelf',
    'shelves_delete_named' => 'Delete Shelf :name',
    'shelves_delete_explain' => "This will delete the shelf with the name ':name'. Contained books will not be deleted.",
    'shelves_delete_confirmation' => 'Are you sure you want to delete this shelf?',
    'shelves_permissions' => 'Shelf Permissions',
    'shelves_permissions_updated' => 'Shelf Permissions Updated',
    'shelves_permissions_active' => 'Shelf Permissions Active',
    'shelves_permissions_cascade_warning' => 'Permissions on shelves do not automatically cascade to contained books. This is because a book can exist on multiple shelves. Permissions can however be copied down to child books using the option found below.',
    'shelves_copy_permissions_to_books' => 'İzinleri Kitaplara Kopyala',
    'shelves_copy_permissions' => 'İzinleri Kopyala',
    'shelves_copy_permissions_explain' => 'This will apply the current permission settings of this shelf to all books contained within. Before activating, ensure any changes to the permissions of this shelf have been saved.',
    'shelves_copy_permission_success' => 'Shelf permissions copied to :count books',

    // Books
    'book' => 'Kitap',
    'books' => 'Kitaplar',
    'x_books' => ':count Kitap|:count Kitap',
    'books_empty' => 'Hiç kitap oluşturulmamış',
    'books_popular' => 'Popüler Kitaplar',
    'books_recent' => 'En Son Kitaplar',
    'books_new' => 'Yeni Kitaplar',
    'books_new_action' => 'Yeni Kitap',
    'books_popular_empty' => 'En popüler kitaplar burada görüntülenecek.',
    'books_new_empty' => 'En yeni kitaplar burada görüntülenecek.',
    'books_create' => 'Yeni Kitap Oluştur',
    'books_delete' => 'Kitabı Sil',
    'books_delete_named' => ':bookName Kitabını Sil',
    'books_delete_explain' => 'Bu işlem \':bookName\' kitabını silecektir. Ayrıca kitaba ait bütün sayfalar ve bölümler de silinecektir.',
    'books_delete_confirmation' => 'Bu kitabı silmek istediğinize emin misiniz?',
    'books_edit' => 'Kitabı Düzenle',
    'books_edit_named' => ':bookName Kitabını Düzenle',
    'books_form_book_name' => 'Kitap Adı',
    'books_save' => 'Kitabı Kaydet',
    'books_permissions' => 'Kitap İzinleri',
    'books_permissions_updated' => 'Kitap İzinleri Güncellendi',
    'books_empty_contents' => 'Bu kitaba ait sayfa veya bölüm oluşturulmamış.',
    'books_empty_create_page' => 'Yeni bir sayfa oluştur',
    'books_empty_sort_current_book' => 'Mevcut kitabı sırala',
    'books_empty_add_chapter' => 'Yeni bir bölüm ekle',
    'books_permissions_active' => 'Kitap İzinleri Aktif',
    'books_search_this' => 'Bu kitapta ara',
    'books_navigation' => 'Kitap Navigasyonu',
    'books_sort' => 'Kitap İçeriklerini Sırala',
    'books_sort_named' => ':bookName Kitabını Sırala',
    'books_sort_name' => 'İsme Göre Sırala',
    'books_sort_created' => 'Oluşturulma Tarihine Göre Sırala',
    'books_sort_updated' => 'Güncelleme Tarihine Göre Sırala',
    'books_sort_chapters_first' => 'Önce Bölümler',
    'books_sort_chapters_last' => 'En Son Bölümler',
    'books_sort_show_other' => 'Diğer Kitapları Göster',
    'books_sort_save' => 'Yeni Düzeni Kaydet',
    'books_copy' => 'Kitabı Kopyala',
    'books_copy_success' => 'Kitap başarıyla kopyalandı',

    // Chapters
    'chapter' => 'Bölüm',
    'chapters' => 'Bölümler',
    'x_chapters' => ':count Bölüm|:count Bölüm',
    'chapters_popular' => 'Popüler Bölümler',
    'chapters_new' => 'Yeni Bölüm',
    'chapters_create' => 'Yeni Bölüm Oluştur',
    'chapters_delete' => 'Bölümü Sil',
    'chapters_delete_named' => ':chapterName Bölümünü Sil',
    'chapters_delete_explain' => 'This will delete the chapter with the name \':chapterName\'. All pages that exist within this chapter will also be deleted.',
    'chapters_delete_confirm' => 'Bölümü silmek istediğinize emin misiniz?',
    'chapters_edit' => 'Bölümü Düzenle',
    'chapters_edit_named' => ':chapterName Bölümünü Düzenle',
    'chapters_save' => 'Bölümü Kaydet',
    'chapters_move' => 'Bölümü Taşı',
    'chapters_move_named' => ':chapterName Bölümünü Taşı',
    'chapter_move_success' => 'Bölüm, :bookName kitabına taşındı',
    'chapters_copy' => 'Bölümü kopyala',
    'chapters_copy_success' => 'Bölüm başarıyla kopyalandı',
    'chapters_permissions' => 'Bölüm İzinleri',
    'chapters_empty' => 'Bu bölümde henüz bir sayfa bulunmuyor.',
    'chapters_permissions_active' => 'Bölüm İzinleri Aktif',
    'chapters_permissions_success' => 'Bölüm İzinleri Güncellendi',
    'chapters_search_this' => 'Bu bölümde ara',
    'chapter_sort_book' => 'Sort Book',

    // Pages
    'page' => 'Sayfa',
    'pages' => 'Sayfalar',
    'x_pages' => ':count Sayfa|:count Sayfa',
    'pages_popular' => 'Popüler Sayfalar',
    'pages_new' => 'Yeni Sayfa',
    'pages_attachments' => 'Ekler',
    'pages_navigation' => 'Sayfa Navigasyonu',
    'pages_delete' => 'Sayfayı Sil',
    'pages_delete_named' => ':pageName Sayfasını Sil',
    'pages_delete_draft_named' => ':pageName Sayfa Taslağını Sil',
    'pages_delete_draft' => 'Sayfa Taslağını Sil',
    'pages_delete_success' => 'Sayfa silindi',
    'pages_delete_draft_success' => 'Sayfa taslağı silindi',
    'pages_delete_confirm' => 'Bu sayfayı silmek istediğinize emin misiniz?',
    'pages_delete_draft_confirm' => 'Bu sayfa taslağını silmek istediğinize emin misiniz?',
    'pages_editing_named' => ':pageName Sayfası Düzenleniyor',
    'pages_edit_draft_options' => 'Taslak Seçenekleri',
    'pages_edit_save_draft' => 'Taslağı Kaydet',
    'pages_edit_draft' => 'Sayfa Taslağını Düzenle',
    'pages_editing_draft' => 'Taslak Düzenleniyor',
    'pages_editing_page' => 'Sayfa Düzenleniyor',
    'pages_edit_draft_save_at' => 'Taslak kaydedildi ',
    'pages_edit_delete_draft' => 'Taslağı Sil',
    'pages_edit_discard_draft' => 'Taslağı Yoksay',
    'pages_edit_switch_to_markdown' => 'Switch to Markdown Editor',
    'pages_edit_switch_to_markdown_clean' => '(Clean Content)',
    'pages_edit_switch_to_markdown_stable' => '(Stable Content)',
    'pages_edit_switch_to_wysiwyg' => 'Switch to WYSIWYG Editor',
    'pages_edit_set_changelog' => 'Değişim Günlüğünü Ayarla',
    'pages_edit_enter_changelog_desc' => 'Yaptığınız değişiklikler hakkında kısa bir açıklama girin',
    'pages_edit_enter_changelog' => 'Değişim Günlüğünü Yazın',
    'pages_editor_switch_title' => 'Switch Editor',
    'pages_editor_switch_are_you_sure' => 'Are you sure you want to change the editor for this page?',
    'pages_editor_switch_consider_following' => 'Consider the following when changing editors:',
    'pages_editor_switch_consideration_a' => 'Once saved, the new editor option will be used by any future editors, including those that may not be able to change editor type themselves.',
    'pages_editor_switch_consideration_b' => 'This can potentially lead to a loss of detail and syntax in certain circumstances.',
    'pages_editor_switch_consideration_c' => 'Tag or changelog changes, made since last save, won\'t persist across this change.',
    'pages_save' => 'Sayfayı Kaydet',
    'pages_title' => 'Sayfa Başlığı',
    'pages_name' => 'Sayfa İsmi',
    'pages_md_editor' => 'Düzenleyici',
    'pages_md_preview' => 'Ön İzleme',
    'pages_md_insert_image' => 'Görsel Ekle',
    'pages_md_insert_link' => 'Öge Bağlantısı Ekle',
    'pages_md_insert_drawing' => 'Çizim Ekle',
    'pages_not_in_chapter' => 'Bu sayfa, bir bölüme ait değil',
    'pages_move' => 'Sayfayı Taşı',
    'pages_move_success' => 'Sayfa şuraya taşındı: :parentName',
    'pages_copy' => 'Sayfayı Kopyala',
    'pages_copy_desination' => 'Kopyalama Hedefi',
    'pages_copy_success' => 'Sayfa başarıyla kopyalandı',
    'pages_permissions' => 'Sayfa İzinleri',
    'pages_permissions_success' => 'Sayfa izinleri güncellendi',
    'pages_revision' => 'Revizyon',
    'pages_revisions' => 'Sayfa Revizyonları',
    'pages_revisions_named' => ':pageName için Sayfa Revizyonları',
    'pages_revision_named' => ':pageName için Sayfa Revizyonu',
    'pages_revision_restored_from' => 'Restored from #:id; :summary',
    'pages_revisions_created_by' => 'Revize Eden',
    'pages_revisions_date' => 'Revizyon Tarihi',
    'pages_revisions_number' => '#',
    'pages_revisions_numbered' => 'Revizyon #:id',
    'pages_revisions_numbered_changes' => 'Revizyon #:id Değişiklikleri',
    'pages_revisions_editor' => 'Editor Type',
    'pages_revisions_changelog' => 'Değişim Günlüğü',
    'pages_revisions_changes' => 'Değişiklikler',
    'pages_revisions_current' => 'Şimdiki Sürüm',
    'pages_revisions_preview' => 'Ön İzleme',
    'pages_revisions_restore' => 'Geri Dön',
    'pages_revisions_none' => 'Bu sayfaya ait herhangi bir revizyon bulunamadı',
    'pages_copy_link' => 'Bağlantıyı kopyala',
    'pages_edit_content_link' => 'İçeriği Düzenle',
    'pages_permissions_active' => 'Sayfa İzinleri Aktif',
    'pages_initial_revision' => 'İlk yayın',
    'pages_references_update_revision' => 'System auto-update of internal links',
    'pages_initial_name' => 'Yeni Sayfa',
    'pages_editing_draft_notification' => 'Şu anda en son :timeDiff tarihinde kaydedilmiş olan taslağı düzenliyorsunuz.',
    'pages_draft_edited_notification' => 'Bu sayfa o zamandan bu zamana güncellenmiş, bu nedenle bu taslağı yok saymanız önerilir.',
    'pages_draft_page_changed_since_creation' => 'This page has been updated since this draft was created. It is recommended that you discard this draft or take care not to overwrite any page changes.',
    'pages_draft_edit_active' => [
        'start_a' => ':count kullanıcı, bu sayfayı düzenlemeye başladı',
        'start_b' => ':userName, bu sayfayı düzenlemeye başladı',
        'time_a' => 'sayfa son güncellendiğinden beri',
        'time_b' => 'son :minCount dakikada',
        'message' => ':start :time. Düzenlemelerinizin çakışmamasına dikkat edin!',
    ],
    'pages_draft_discarded' => 'Taslak yok sayıldı. Düzenleyici, mevcut sayfa içeriği kullanılarak güncellendi',
    'pages_specific' => 'Spesifik Sayfa',
    'pages_is_template' => 'Sayfa Şablonu',

    // Editor Sidebar
    'page_tags' => 'Sayfa Etiketleri',
    'chapter_tags' => 'Bölüm Etiketleri',
    'book_tags' => 'Kitap Etiketleri',
    'shelf_tags' => 'Kitaplık Etiketleri',
    'tag' => 'Etiket',
    'tags' =>  'Etiketler',
    'tag_name' =>  'Etiket İsmi',
    'tag_value' => 'Etiket Değeri (Opsiyonel)',
    'tags_explain' => "İçeriğinizi daha iyi kategorize etmek için etiket ekleyin. Etiketlere değer atayarak daha derinlemesine bir düzen elde edebilirsiniz.",
    'tags_add' => 'Başka etiket ekle',
    'tags_remove' => 'Bu etiketi sil',
    'tags_usages' => 'Total tag usages',
    'tags_assigned_pages' => 'Assigned to Pages',
    'tags_assigned_chapters' => 'Assigned to Chapters',
    'tags_assigned_books' => 'Assigned to Books',
    'tags_assigned_shelves' => 'Assigned to Shelves',
    'tags_x_unique_values' => ':count unique values',
    'tags_all_values' => 'Tüm değerler',
    'tags_view_tags' => 'Etiketleri Göster',
    'tags_view_existing_tags' => 'Mevcut etiketleri göster',
    'tags_list_empty_hint' => 'Etiketleri sayfa editörü yan menüsünden veya kitap, bölüm veya rafları düzenlerken ekleyebilirsiniz.',
    'attachments' => 'Ekler',
    'attachments_explain' => 'Sayfanızda göstermek için dosyalar yükleyin veya bağlantılar ekleyin. Bunlar, sayfaya ait yan menüde gösterilecektir.',
    'attachments_explain_instant_save' => 'Burada yapılan değişiklikler anında kaydedilir.',
    'attachments_items' => 'Eklenmiş Ögeler',
    'attachments_upload' => 'Dosya Yükle',
    'attachments_link' => 'Link Ekle',
    'attachments_set_link' => 'Bağlantıyı Ata',
    'attachments_delete' => 'Bu eki silmek istediğinize emin misiniz?',
    'attachments_dropzone' => 'Dosyaları sürükleyin veya seçin',
    'attachments_no_files' => 'Hiçbir dosya yüklenmedi',
    'attachments_explain_link' => 'Eğer dosya yüklememeyi tercih ederseniz bağlantı ekleyebilirsiniz. Bu bağlantı başka bir sayfanın veya bulut depolamadaki bir dosyanın bağlantısı olabilir.',
    'attachments_link_name' => 'Bağlantı Adı',
    'attachment_link' => 'Ek bağlantısı',
    'attachments_link_url' => 'Dosya bağlantısı',
    'attachments_link_url_hint' => 'Dosyanın veya sitenin url adresi',
    'attach' => 'Ekle',
    'attachments_insert_link' => 'Sayfaya Bağlantı Ekle',
    'attachments_edit_file' => 'Dosyayı Düzenle',
    'attachments_edit_file_name' => 'Dosya Adı',
    'attachments_edit_drop_upload' => 'Üzerine yazılacak dosyaları sürükleyin veya seçin',
    'attachments_order_updated' => 'Ek sıralaması güncellendi',
    'attachments_updated_success' => 'Ek detayları güncellendi',
    'attachments_deleted' => 'Ek silindi',
    'attachments_file_uploaded' => 'Dosya başarıyla yüklendi',
    'attachments_file_updated' => 'Dosya başarıyla güncellendi',
    'attachments_link_attached' => 'Bağlantı, sayfaya başarıyla eklendi',
    'templates' => 'Şablonlar',
    'templates_set_as_template' => 'Bu sayfa, bir şablondur',
    'templates_explain_set_as_template' => 'Başka sayfalar oluştururken bu sayfanın içeriğini kullanabilmek için bu sayfayı bir şablon olarak ayarlayabilirsiniz. Bu sayfayı görüntüleme yetkisi olan kullanıcılar da bu şablonu kullanabileceklerdir.',
    'templates_replace_content' => 'Sayfa içeriğini değiştir',
    'templates_append_content' => 'Sayfa içeriğine ekle',
    'templates_prepend_content' => 'Sayfa içeriğinin başına ekle',

    // Profile View
    'profile_user_for_x' => 'Üyelik süresi: :time',
    'profile_created_content' => 'Oluşturulan İçerik',
    'profile_not_created_pages' => ':userName herhangi bir sayfa oluşturmamış',
    'profile_not_created_chapters' => ':userName herhangi bir bölüm oluşturmamış',
    'profile_not_created_books' => ':userName herhangi bir kitap oluşturmamış',
    'profile_not_created_shelves' => ':userName herhangi bir kitaplık oluşturmamış',

    // Comments
    'comment' => 'Yorum',
    'comments' => 'Yorumlar',
    'comment_add' => 'Yorum Ekle',
    'comment_placeholder' => 'Buraya bir yorum yazın',
    'comment_count' => '{0} Yorum Yapılmamış|{1} 1 Yorum|[2,*] :count Yorum',
    'comment_save' => 'Yorumu Gönder',
    'comment_saving' => 'Yorum gönderiliyor...',
    'comment_deleting' => 'Yorum siliniyor...',
    'comment_new' => 'Yeni Yorum',
    'comment_created' => ':createDiff yorum yaptı',
    'comment_updated' => ':username tarafından :updateDiff güncellendi',
    'comment_deleted_success' => 'Yorum silindi',
    'comment_created_success' => 'Yorum gönderildi',
    'comment_updated_success' => 'Yorum güncellendi',
    'comment_delete_confirm' => 'Bu yorumu silmek istediğinize emin misiniz?',
    'comment_in_reply_to' => ':commentId yorumuna yanıt olarak',

    // Revision
    'revision_delete_confirm' => 'Bu revizyonu silmek istediğinize emin misiniz?',
    'revision_restore_confirm' => 'Bu revizyonu yeniden yüklemek istediğinize emin misiniz? Sayfanın şu anki içeriği değiştirilecektir.',
    'revision_delete_success' => 'Revizyon silindi',
    'revision_cannot_delete_latest' => 'Son revizyonu silemezsiniz.',

    // Copy view
    'copy_consider' => 'İçeriği kopyalarken aşağıdakileri hesaba katınız.',
    'copy_consider_permissions' => 'Özel izin ayarları kopyalanmayacak.',
    'copy_consider_owner' => 'Tüm kopyalanan içeriğin sahibi olacaksınız.',
    'copy_consider_images' => 'Sayfa resim dosyalarının ikinci bir kopyası oluşturulmayıp, resimlerin ilk yüklendiği sayfadaki bağlantısı tutulacaktır.',
    'copy_consider_attachments' => 'Sayfa ekleri kopyalanmayacak.',
    'copy_consider_access' => 'Konum, sahiplik veya izinlerde yapılan bir değişiklik önceden erişimi olmayanlara erişim hakkı kazandırabilir.',

    // Conversions
    'convert_to_shelf' => 'Convert to Shelf',
    'convert_to_shelf_contents_desc' => 'You can convert this book to a new shelf with the same contents. Chapters contained within this book will be converted to new books. If this book contains any pages, that are not in a chapter, this book will be renamed and contain such pages, and this book will become part of the new shelf.',
    'convert_to_shelf_permissions_desc' => 'Any permissions set on this book will be copied to the new shelf and to all new child books that don\'t have their own permissions enforced. Note that permissions on shelves do not auto-cascade to content within, as they do for books.',
    'convert_book' => 'Convert Book',
    'convert_book_confirm' => 'Are you sure you want to convert this book?',
    'convert_undo_warning' => 'This cannot be as easily undone.',
    'convert_to_book' => 'Convert to Book',
    'convert_to_book_desc' => 'You can convert this chapter to a new book with the same contents. Any permissions set on this chapter will be copied to the new book but any inherited permissions, from the parent book, will not be copied which could lead to a change of access control.',
    'convert_chapter' => 'Convert Chapter',
    'convert_chapter_confirm' => 'Are you sure you want to convert this chapter?',

    // References
    'references' => 'References',
    'references_none' => 'There are no tracked references to this item.',
    'references_to_desc' => 'Shown below are all the known pages in the system that link to this item.',
];
