<form

    <?php print html_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>

    <!-- Field Generation Start -->
    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>

        <label><br> <?php print $field['label']; ?><br></label>
        <?php if (in_array($field['type'], ['text', 'number','email', 'password', 'color'])): ?>

            <input <?php print input_attr($field_id,  $field) ;?>>

        <?php elseif (in_array($field['type'], ['select'])) : ?>

            <select <?php print select_attr($field_id, $field); ?>>

                <?php foreach ($field['options'] as $option_id => $option): ?>

                    <option <?php print option_attr($field, $option_id); ?>>
                        <?php print $option; ?>
                    </option>

                <?php endforeach; ?>
            </select>
        <?php elseif (in_array($field['type'], ['textarea'])): ?>

            <textarea <?php print textarea_attr($field, $field_id);?>>
<!--                    --><?php //print $field['value'] ?? ''; ?>
            </textarea>

        <?php endif; ?>

        <?php if (isset($field['error'])): ?>
            <span style="color:red"><?php print  $field['error']; ?></span>
        <?php endif ?>

    <?php endforeach ?>

    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
        <button <?php print html_attr(
            ($button['extra']['attr'] ?? []) + ['value' => $button_id, 'name' => 'action']); ?>>
            <?php print $button['text']; ?>
        </button>
    <?php endforeach; ?>
    <?php if(isset($form['error'])): ?>
        <span style="color:red"><?php print  $form['error'] ; ?></span>
    <?php endif; ?>
</form>
