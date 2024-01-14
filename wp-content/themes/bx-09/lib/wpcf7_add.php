<?php
if (function_exists('wpcf7_add_form_tag')) {
    add_action('wpcf7_init', 'wpcf7_add_form_tag_mycheckbox', 10, 0);

    function wpcf7_add_form_tag_mycheckbox()
    {
        wpcf7_add_form_tag(
            array( 'mycheckbox', 'mycheckbox*', 'myradio' ),
            'wpcf7_checkbox_form_mytag_handler',
            array(
                'name-attr' => true,
                'selectable-values' => true,
                'multiple-controls-container' => true,
            )
        );
    }

    function wpcf7_checkbox_form_mytag_handler($tag)
    {
        $tag = new WPCF7_FormTag($tag);
        if (empty($tag->name)) {
            return '';
        }

        $validation_error = wpcf7_get_validation_error($tag->name);

        $class = wpcf7_form_controls_class($tag->type);

        if ($validation_error) {
            $class .= ' wpcf7-not-valid';
        }

        $label_first = $tag->has_option('label_first');
        $use_label_element = $tag->has_option('use_label_element');
        $exclusive = $tag->has_option('exclusive');
        $free_text = $tag->has_option('free_text');
        $multiple = false;

        if ('mycheckbox' == $tag->basetype) {
            $multiple = !$exclusive;
        } else { // radio
            $exclusive = false;
        }

        if ($exclusive) {
            $class .= ' wpcf7-exclusive-checkbox';
        }

        $atts = array();

        if ($validation_error) {
            $atts['aria-describedby'] = wpcf7_get_validation_error_reference(
                $tag->name
            );
        }

        $tabindex = $tag->get_option('tabindex', 'signed_int', true);

        if (false !== $tabindex) {
            $tabindex = (int) $tabindex;
        }

        $html = '';
        $count = 0;

        if ($data = (array) $tag->get_data_option()) {
            if ($free_text) {
                $tag->values = array_merge(
                    array_slice($tag->values, 0, -1),
                    array_values($data),
                    array_slice($tag->values, -1)
                );
                $tag->labels = array_merge(
                    array_slice($tag->labels, 0, -1),
                    array_values($data),
                    array_slice($tag->labels, -1)
                );
            } else {
                $tag->values = array_merge($tag->values, array_values($data));
                $tag->labels = array_merge($tag->labels, array_values($data));
            }
        }

        $values = $tag->values;
        $labels = $tag->labels;

        if ('mycheckbox' == $tag->basetype) {
            $my_type = 'checkbox';
            $my_class = 'o-box o-box--checkbox';
        } else {
            $my_type = 'radio';
            $my_class = 'o-box o-box--radio';
        }
        $wrap_class = 'o-icon-parent o-icon-parent--center o-icon-parent--form-item';

        $default_choice = $tag->get_default_option(null, array(
            'multiple' => $multiple,
        ));

        $hangover = wpcf7_get_hangover($tag->name, $multiple ? array() : '');

        foreach ($values as $key => $value) {
            if ($hangover) {
                $checked = in_array($value, (array) $hangover, true);
            } else {
                $checked = in_array($value, (array) $default_choice, true);
            }

            if (isset($labels[$key])) {
                $label = $labels[$key];
            } else {
                $label = $value;
            }

            $item_atts = array(
                'type' => $my_type,
                'class' => $my_class,
                'name' => $tag->name . ($multiple ? '[]' : ''),
                'value' => $value,
                'checked' => $checked ? 'checked' : '',
                'tabindex' => false !== $tabindex ? $tabindex : '',
            );

            $item_atts = wpcf7_format_atts($item_atts);

            if ($label_first) { // put label first, input last
                $item = sprintf(
                    '%1$s<input %2$s />',
                    esc_html($label),
                    $item_atts
                );
            } else {
                $item = sprintf(
                    '<input %2$s />%1$s',
                    esc_html($label),
                    $item_atts
                );
            }

            if ($use_label_element) {
                $item = '<label class="' . $wrap_class . '">' . $item . '</label>';
            }

            if (false !== $tabindex and 0 < $tabindex) {
                $tabindex += 1;
            }

            $count += 1;

            if (count($values) == $count) { // last round
                if ($free_text) {
                    $free_text_name = $tag->name . '_free_text';

                    $free_text_atts = array(
                        'name' => $free_text_name,
                        'class' => 'wpcf7-free-text',
                        'tabindex' => false !== $tabindex ? $tabindex : '',
                    );

                    if (wpcf7_is_posted() and isset($_POST[$free_text_name])) {
                        $free_text_atts['value'] = wp_unslash(
                            $_POST[$free_text_name]
                        );
                    }

                    $free_text_atts = wpcf7_format_atts($free_text_atts);

                    $item .= sprintf(' <input type="text" %s />', $free_text_atts);
                }
            }

            $html .= $item;
        }

        $atts = wpcf7_format_atts($atts);

        $html = sprintf(
            '<span class="wpcf7-form-control-wrap %1$s"><span class="o-cluster" %2$s>%3$s</span>%4$s</span>',
            sanitize_html_class($tag->name),
            $atts,
            $html,
            $validation_error
        );

        return $html;
    }


    /* Validation filter */

    add_filter(
        'wpcf7_validate_mycheckbox',
        'wpcf7_mycheckbox_validation_filter',
        10,
        2
    );
    add_filter(
        'wpcf7_validate_mycheckbox*',
        'wpcf7_mycheckbox_validation_filter',
        10,
        2
    );
    add_filter(
        'wpcf7_validate_myradio',
        'wpcf7_mycheckbox_validation_filter',
        10,
        2
    );

    function wpcf7_mycheckbox_validation_filter($result, $tag)
    {
        $name = $tag->name;
        $is_required = $tag->is_required() || 'radio' == $tag->type;
        $value = isset($_POST[$name]) ? (array) $_POST[$name] : array();

        if ($is_required and empty($value)) {
            $result->invalidate($tag, wpcf7_get_message('invalid_required'));
        }

        return $result;
    }


    /* Tag generator */

    add_action(
        'wpcf7_admin_init',
        'wpcf7_add_tag_generator_mycheckbox_and_myradio',
        30,
        0
    );

    function wpcf7_add_tag_generator_mycheckbox_and_myradio()
    {
        $tag_generator = WPCF7_TagGenerator::get_instance();
        $tag_generator->add(
            'mycheckbox',
            __('カスタムチェックボックス', 'contact-form-7'),
            'wpcf7_tag_generator_mycheckbox'
        );
        $tag_generator->add(
            'myradio',
            __('カスタムラジオボタン', 'contact-form-7'),
            'wpcf7_tag_generator_mycheckbox'
        );
    }

    function wpcf7_tag_generator_mycheckbox($contact_form, $args = '')
    {
        $args = wp_parse_args($args, array());
        $type = $args['id'];

        if ('myradio' != $type) {
            $type = 'mycheckbox';
        }

        if ('mycheckbox' == $type) {
            $description = __("Generate a form-tag for a group of mycheckboxes. For more details, see %s.", 'contact-form-7');
        } elseif ('myradio' == $type) {
            $description = __("Generate a form-tag for a group of myradio buttons. For more details, see %s.", 'contact-form-7');
        } ?>
<div class="control-box">
  <fieldset>

    <table class="form-table">
      <tbody>
        <?php if ('mycheckbox' == $type) : ?>
        <tr>
          <th scope="row">
            <?php echo esc_html(__('Field type', 'contact-form-7')); ?>
          </th>
          <td>
            <fieldset>
              <legend class="screen-reader-text">
                <?php echo esc_html(__('Field type', 'contact-form-7')); ?>
              </legend>
              <label><input type="checkbox" name="required" />
                <?php echo esc_html(__('Required field', 'contact-form-7')); ?></label>
            </fieldset>
          </td>
        </tr>
        <?php endif; ?>

        <tr>
          <th scope="row"><label
              for="<?php echo esc_attr($args['content'] . '-name'); ?>"><?php echo esc_html(__('Name', 'contact-form-7')); ?></label>
          </th>
          <td><input type="text" name="name" class="tg-name oneline"
              id="<?php echo esc_attr($args['content'] . '-name'); ?>" />
          </td>
        </tr>

        <tr>
          <th scope="row">
            <?php echo esc_html(__('Options', 'contact-form-7')); ?>
          </th>
          <td>
            <fieldset>
              <legend class="screen-reader-text">
                <?php echo esc_html(__('Options', 'contact-form-7')); ?>
              </legend>
              <textarea name="values" class="values"
                id="<?php echo esc_attr($args['content'] . '-values'); ?>"></textarea>
              <label
                for="<?php echo esc_attr($args['content'] . '-values'); ?>"><span
                  class="description"><?php echo esc_html(__("One option per line.", 'contact-form-7')); ?></span></label><br />
              <label><input type="checkbox" name="label_first" class="option" />
                <?php echo esc_html(__('Put a label first, a checkbox last', 'contact-form-7')); ?></label><br />
              <label><input type="checkbox" name="use_label_element" class="option" checked="checked" />
                <?php echo esc_html(__('Wrap each item with label element', 'contact-form-7')); ?></label>
              <?php if ('mycheckbox' == $type) : ?>
              <br /><label><input type="checkbox" name="exclusive" class="option" />
                <?php echo esc_html(__('Make checkboxes exclusive', 'contact-form-7')); ?></label>
              <?php endif; ?>
            </fieldset>
          </td>
        </tr>

      </tbody>
    </table>
  </fieldset>
</div>

<div class="insert-box">
  <input type="text" name="<?php echo $type; ?>" class="tag code"
    readonly="readonly" onfocus="this.select()" />

  <div class="submitbox">
    <input type="button" class="button button-primary insert-tag"
      value="<?php echo esc_attr(__('Insert Tag', 'contact-form-7')); ?>" />
  </div>

  <br class="clear" />

  <p class="description mail-tag"><label
      for="<?php echo esc_attr($args['content'] . '-mailtag'); ?>"><?php echo sprintf(esc_html(__("To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'contact-form-7')), '<strong><span class="mail-tag"></span></strong>'); ?><input
        type="text" class="mail-tag code hidden" readonly="readonly"
        id="<?php echo esc_attr($args['content'] . '-mailtag'); ?>" /></label>
  </p>
</div>
<?php
    }
    add_action('wpcf7_init', 'wpcf7_add_form_tag_pp_acceptance');
    function wpcf7_add_form_tag_pp_acceptance()
    {
        wpcf7_add_form_tag(
            'pp_acceptance',
            'wpcf7_pp_acceptance_form_tag_handler'
        );
    }
    function wpcf7_pp_acceptance_form_tag_handler($tag)
    {
        $validation_error = wpcf7_get_validation_error('pp-acceptance');
        $class = wpcf7_form_controls_class('acceptance');
        if ($validation_error) {
            $class .= ' wpcf7-not-valid';
        }
        if ($tag->has_option('invert')) {
            $class .= ' invert';
        }
        $atts = array(
            'class' => trim($class),
        );
        $wrap_class = 'o-icon-parent o-icon-parent--center o-icon-parent--form-item u-full-width u-mt-m u-mb-m';
        $item_atts = array();
        $item_atts['class'] = 'o-box o-box--checkbox';
        $item_atts['type'] = 'checkbox';
        $item_atts['name'] = 'pp-acceptance';
        $item_atts['value'] = '1';
        $item_atts['tabindex'] = $tag->get_option('tabindex', 'signed_int', true);
        if ($validation_error) {
            $item_atts['aria-invalid'] = 'true';
            $item_atts['aria-describedby'] = wpcf7_get_validation_error_reference(
                'pp-acceptance'
            );
        } else {
            $item_atts['aria-invalid'] = 'false';
        }
        $item_atts = wpcf7_format_atts($item_atts);
        $content = '<a class="c-text-link c-text-link--underline" target="_blank" rel="noopener" href="' . home_url('/privacy-policy/') . '">プライバシーポリシー</a>に同意する';
        $html = sprintf('<label class="' . $wrap_class . '"><input %1$s />' . $content . '</label>', $item_atts);
        $atts = wpcf7_format_atts($atts);
        $html = sprintf(
            '<span class="wpcf7-form-control-wrap" data-name="%1$s"><span %2$s>%3$s</span>%4$s</span>',
            sanitize_html_class('pp-acceptance'),
            $atts,
            $html,
            $validation_error
        );
        return $html;
    }
    /* Validation filter */
    add_filter('wpcf7_validate_pp_acceptance', 'wpcf7_pp_acceptance_validation_filter', 10, 2);
    function wpcf7_pp_acceptance_validation_filter($result, $tag)
    {
        if (!wpcf7_pp_acceptance_as_validation()) {
            return $result;
        }
        $name = 'pp-acceptance';
        $value = (!empty($_POST[$name]) ? 1 : 0);
        $invert = $tag->has_option('invert');
        if ($invert and $value or !$invert and !$value) {
            $result->invalidate($tag, wpcf7_get_message('accept_terms'));
        }
        return $result;
    }
    /* Acceptance filter */
    add_filter('wpcf7_pp_acceptance', 'wpcf7_pp_acceptance_filter', 10, 2);
    function wpcf7_pp_acceptance_filter($accepted, $submission)
    {
        $tags = wpcf7_scan_form_tags(array( 'type' => 'pp_acceptance' ));
        foreach ($tags as $tag) {
            $name = 'pp-acceptance';
            if (empty($name)) {
                continue;
            }
            $value = (!empty($_POST[$name]) ? 1 : 0);
            $content = empty($tag->content) ? (string) reset($tag->values) : $tag->content;
            $content = trim($content);
            if ($value and $content) {
                $submission->add_consent($name, $content);
            }
            $invert = $tag->has_option('invert');
            if ($invert and $value or !$invert and !$value) {
                $accepted = false;
            }
        }
        return $accepted;
    }
    add_filter('wpcf7_form_class_attr', 'wpcf7_pp_acceptance_form_class_attr', 10, 1);
    function wpcf7_pp_acceptance_form_class_attr($class)
    {
        if (wpcf7_pp_acceptance_as_validation()) {
            return $class . ' wpcf7-acceptance-as-validation';
        }
        return $class;
    }
    function wpcf7_pp_acceptance_as_validation()
    {
        if (!$contact_form = wpcf7_get_current_contact_form()) {
            return false;
        }
        return $contact_form->is_true('acceptance_as_validation');
    }
    add_filter('wpcf7_mail_tag_replaced_acceptance', 'wpcf7_pp_acceptance_mail_tag', 10, 4);
    function wpcf7_pp_acceptance_mail_tag($replaced, $submitted, $html, $mail_tag)
    {
        $form_tag = $mail_tag->corresponding_form_tag();
        if (!$form_tag) {
            return $replaced;
        }
        if (!empty($submitted)) {
            $replaced = __('Consented', 'contact-form-7');
        } else {
            $replaced = __('Not consented', 'contact-form-7');
        }
        $content = empty($form_tag->content) ? (string) reset($form_tag->values) : $form_tag->content;
        if (!$html) {
            $content = wp_strip_all_tags($content);
        }
        $content = trim($content);
        if ($content) {
            $replaced = sprintf(
                /* translators: 1: 'Consented' or 'Not consented', 2: conditions */
                _x(
                    '%1$s: %2$s',
                    'mail output for acceptance checkboxes',
                    'contact-form-7'
                ),
                $replaced,
                $content
            );
        }
        return $replaced;
    }
    /* Tag generator */
    add_action('wpcf7_admin_init', 'wpcf7_add_tag_generator_pp_acceptance', 35, 0);
    function wpcf7_add_tag_generator_pp_acceptance()
    {
        $tag_generator = WPCF7_TagGenerator::get_instance();
        $tag_generator->add(
            'pp_acceptance',
            __('プライバシーポリシー同意ボタン', 'contact-form-7'),
            'wpcf7_tag_generator_pp_acceptance'
        );
    }
    function wpcf7_tag_generator_pp_acceptance($contact_form, $args = '')
    {
        $args = wp_parse_args($args, array());
        $type = 'pp_acceptance';
        $description = __("Generate a form-tag for an acceptance checkbox. For more details, see %s.", 'contact-form-7'); ?>
<div class="insert-box">
  <input type="text" name="<?php echo $type; ?>" class="tag code"
    readonly="readonly" onfocus="this.select()" />
  <div class="submitbox">
    <input type="button" class="button button-primary insert-tag"
      value="<?php echo esc_attr(__('Insert Tag', 'contact-form-7')); ?>" />
  </div>
</div>
<?php
    }
}
?>
