<?php

class __Mustache_a1868e37d9316e21ea25eda2270aa1df extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<span class="dir-rtl-hide">
';
        $buffer .= $indent . '    <span class="sr-only">';
        $value = $context->find('str');
        $buffer .= $this->section2a4aee39cd6b4acbcb1cd2bd6db7c30c($context, $indent, $value);
        $buffer .= '</span>
';
        $buffer .= $indent . '    <svg width="22" height="22" fill="none" viewBox="0 0 24 24">
';
        $buffer .= $indent . '        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.25 4.75L4.75 9L9.25 13.25"></path>
';
        $buffer .= $indent . '        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.5 9H15.25C17.4591 9 19.25 10.7909 19.25 13V19.25"></path>
';
        $buffer .= $indent . '    </svg>
';
        $buffer .= $indent . '</span>
';
        $buffer .= $indent . '<span class="dir-ltr-hide">
';
        $buffer .= $indent . '    <span class="sr-only">';
        $value = $context->find('str');
        $buffer .= $this->section2a4aee39cd6b4acbcb1cd2bd6db7c30c($context, $indent, $value);
        $buffer .= '</span>
';
        $buffer .= $indent . '    <svg width="22" height="22" fill="none" viewBox="0 0 24 24">
';
        $buffer .= $indent . '        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.75 4.75L19.25 9L14.75 13.25"></path>
';
        $buffer .= $indent . '        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.25 9H8.75C6.54086 9 4.75 10.7909 4.75 13V19.25"></path>
';
        $buffer .= $indent . '    </svg>
';
        $buffer .= $indent . '</span>
';

        return $buffer;
    }

    private function section2a4aee39cd6b4acbcb1cd2bd6db7c30c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'backto, message';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'backto, message';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
