<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->addExternalCss($this->GetFolder().'/css/common.css');

//var_dump($arResult);
?>

<div class="contact-form">
    <div class="contact-form__head">
        <div class="contact-form__head-title"><?= $arResult['FORM_TITLE']; ?></div>
        <div class="contact-form__head-text"><?= $arResult['FORM_DESCRIPTION']; ?></div>
    </div>
    <form class="contact-form__form" action="<?= POST_FORM_ACTION_URI ?>" method="POST"
          name="<?= $arResult['WEB_FORM_NAME']; ?>" enctype="multipart/form-data">
        <input type="hidden" name="sessid" id="sessid" value="<?= bitrix_sessid(); ?>"/>
        <input type="hidden" name="WEB_FORM_ID" value="<?= $arResult['arForm']['ID']; ?>"/>
        <div class="contact-form__form-inputs">

            <? foreach ($arResult['arAnswers'] as $key => $answers): ?>
                <?
                $answer = current($answers);
                $name = 'form_' . $answer['FIELD_TYPE'] . '_' . $answer['ID'];
                if ($answer['FIELD_TYPE'] == 'textarea') continue;
                $question = $arResult['arQuestions'][$key];
                ?>

                <div class="input contact-form__input">
                    <label class="input__label" for="<?= $name; ?>">
                        <div class="input__label-text"><?= $question['TITLE'] ?><?= $question['REQUIRED'] == 'Y' ? '*' : ''; ?></div>

                        <? if ($answer['FIELD_TYPE'] == 'text'): ?>
                            <input class="input__input" type="<?= $answers['FIELD_TYPE'] ?>" id="<?= $name; ?>"
                                   name="<?= $name; ?>" value="" required="">
                            <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                        <? endif; ?>

                        <? if ($answer['FIELD_TYPE'] == 'email'): ?>
                            <input class="input__input" type="<?= $answers['FIELD_TYPE'] ?>" id="<?= $name; ?>"
                                   name="<?= $name; ?>" value="" required="">
                            <div class="input__notification">Неверный формат почты</div>
                        <? endif; ?>

                        <? if ($answer['FIELD_TYPE'] == 'tel'): ?>
                            <input class="input__input" type="<?= $answers['FIELD_TYPE'] ?>" id="<?= $name; ?>"
                                   data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'" maxlength="12"
                                   x-autocompletetype="phone-full" name="<?= $name; ?>" value="" required="">
                        <? endif; ?>

                        <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                    </label>
                </div>
            <? endforeach; ?>
        </div>

        <?
        $answer = current($arResult['arAnswers']['SIMPLE_QUESTION_566']);
        $question = $arResult['arQuestions']['SIMPLE_QUESTION_566'];
        $name = 'form_' . $answer['FIELD_TYPE'] . '_' . $answer['ID'];
        ?>

        <div class="contact-form__form-message">
            <div class="input">
                <label class="input__label" for="<?= $name; ?>">
                    <div class="input__label-text"><?= $question['TITLE'] ?><?= $question['REQUIRED'] == 'Y' ? '*' : ''; ?></div>
                    <textarea class="input__input" type="text" id="<?= $name; ?>" name="<?= $name; ?>"
                              value=""></textarea>
                    <div class="input__notification"></div>
                </label>
            </div>
        </div>
        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>
            <button class="form-button contact-form__bottom-button" data-success="Отправлено"
                    data-error="Ошибка отправки" name="web_form_apply" type="submit"
                    value="<?= GetMessage("FORM_APPLY") ?>"
            <div class="form-button__title"><?= $arResult['arForm']['BUTTON'] ?></div>
            </button>
        </div>
    </form>
</div>
