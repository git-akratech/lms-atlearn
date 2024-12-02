<?php

class __Mustache_e4b1d6d6179ffed538e5bb37cd22b2ea extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '<div class="hidden rui-message-header-margin" aria-hidden="true" data-region="view-settings">
';
        $buffer .= $indent . '    <div class="d-flex align-items-center w-100">
';
        $value = $context->find('isdrawer');
        $buffer .= $this->section113b0c8ce112985ab7fbf3255a9814be($context, $indent, $value);
        $buffer .= $indent . '        <h4 class="rui-message-heading ml-3">
';
        $buffer .= $indent . '            ';
        $value = $context->find('str');
        $buffer .= $this->section89fe6ec2ad927929ef01bc4d6a8446c4($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '        </h4>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function section113b0c8ce112985ab7fbf3255a9814be(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="align-self-stretch">
            <a href="#" class="btn-msg d-flex align-items-center text-decoration-none ml-3" data-route-back role="button">
                {{> core_message/message_drawer_icon_back }}
            </a>
        </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <div class="align-self-stretch">
';
                $buffer .= $indent . '            <a href="#" class="btn-msg d-flex align-items-center text-decoration-none ml-3" data-route-back role="button">
';
                if ($partial = $this->mustache->loadPartial('core_message/message_drawer_icon_back')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                ');
                }
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section89fe6ec2ad927929ef01bc4d6a8446c4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' settings, core ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' settings, core ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
