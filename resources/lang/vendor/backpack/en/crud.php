<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'Save and new item',
    'save_action_save_and_edit' => 'Save and edit this item',
    'save_action_save_and_back' => 'Save and back',
    'save_action_changed_notification' => 'Default behaviour after saving has been changed.',

    // Create form
    'add'                 => 'Tambah',
    'back_to_all'         => 'Kembali ke semua ',
    'cancel'              => 'Cancel',
    'add_a_new'           => 'Tambah',

    // Edit form
    'edit'                 => 'Ubah',
    'save'                 => 'Save',

    // Revisions
    'revisions'            => 'Revisions',
    'no_revisions'         => 'No revisions found',
    'created_this'          => 'created this',
    'changed_the'          => 'changed the',
    'restore_this_value'   => 'Restore this value',
    'from'                 => 'from',
    'to'                   => 'to',
    'undo'                 => 'Undo',
    'revision_restored'    => 'Revision successfully restored',

    // CRUD table view
    'all'                       => ' ',
    'in_the_database'           => '',
    'list'                      => 'List',
    'actions'                   => 'Aksi',
    'preview'                   => 'Preview',
    'delete'                    => 'Hapus',
    'admin'                     => 'AR',
    'details_row'               => 'This is the details row. Modify as you please.',
    'details_row_loading_error' => 'There was an error loading the details. Please retry.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Apakah anda yakin akan menghapus data ini?',
        'delete_confirmation_title'                   => 'Data Terhapus',
        'delete_confirmation_message'                 => 'Data Berhasil Dihapus.',
        'delete_confirmation_not_title'               => 'NOT deleted',
        'delete_confirmation_not_message'             => "There's been an error. Your item might not have been deleted.",
        'delete_confirmation_not_deleted_title'       => 'Not deleted',
        'delete_confirmation_not_deleted_message'     => 'Nothing happened. Your item is safe.',

        // DataTables translation
        'emptyTable'     => 'Tidak ada data dalam tabel ini',
        'info'           => 'Menampilkan _START_ sampai _END_ dari _TOTAL_ Data',
        'infoEmpty'      => 'Menampilkan 0 sampai 0 dari 0 data',
        'infoFiltered'   => '(filtered from _MAX_ total entries)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => 'Tampilkan_MENU_ Data Tiap Halaman',
        'loadingRecords' => 'Loading...',
        'processing'     => 'Proses mengambil data...',
        'search'         => 'Cari: ',
        'zeroRecords'    => 'No matching records found',
        'paginate'       => [
            'first'    => 'Pertama',
            'last'     => 'Terakhir',
            'next'     => 'Selanjutnya',
            'previous' => 'Sebelumnya',
        ],
        'aria' => [
            'sortAscending'  => ': activate to sort column ascending',
            'sortDescending' => ': activate to sort column descending',
        ],

    // global crud - errors
        'unauthorized_access' => 'Unauthorized access - you do not have the necessary permissions to see this page.',
        'please_fix' => 'Please fix the following errors:',

    // global crud - success / error notification bubbles
        'insert_success' => 'Data Berhasil Ditambahkan.',
        'update_success' => 'Data Berhasil Diubah.',

    // CRUD reorder view
        'reorder'                      => 'Reorder',
        'reorder_text'                 => 'Use drag&drop to reorder.',
        'reorder_success_title'        => 'Done',
        'reorder_success_message'      => 'Your order has been saved.',
        'reorder_error_title'          => 'Error',
        'reorder_error_message'        => 'Your order has not been saved.',

    // CRUD yes/no
        'yes' => 'Yes',
        'no' => 'No',

    // Fields
        'browse_uploads' => 'Browse uploads',
        'clear' => 'Clear',
        'page_link' => 'Page link',
        'page_link_placeholder' => 'http://example.com/your-desired-page',
        'internal_link' => 'Internal link',
        'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
        'external_link' => 'External link',
        'choose_file' => 'Choose file',

    //Table field
        'table_cant_add' => 'Cannot add new :entity',
        'table_max_reached' => 'Maximum number of :max reached',

    // File manager
    'file_manager' => 'File Manager',
];
