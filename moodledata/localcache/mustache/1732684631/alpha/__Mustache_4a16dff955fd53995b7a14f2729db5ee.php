<?php

class __Mustache_4a16dff955fd53995b7a14f2729db5ee extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div
';
        $buffer .= $indent . '    id="sticky-footer"
';
        $buffer .= $indent . '    class="d-flex flex-row align-items-center stickyfooter p-1 fixed-bottom ';
        $buffer .= ' ';
        $blockFunction = $context->findInBlock('stickyclasses');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $value = $context->find('stickyclasses');
            $buffer .= $this->section5a324ad1f27a187c309c4fa56c204493($context, $indent, $value);
            $value = $context->find('stickyclasses');
            if (empty($value)) {
                
                $buffer .= 'justify-content-end';
            }
        }
        $buffer .= '"
';
        $blockFunction = $context->findInBlock('disable');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $buffer .= $indent . '        ';
            $value = $context->find('disable');
            $buffer .= $this->section352d85d73c1735100321ca105f9cdac8($context, $indent, $value);
            $buffer .= '
';
        }
        $blockFunction = $context->findInBlock('extradata');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $value = $context->find('extras');
            $buffer .= $this->section68abcf3ec7595c6741785560fd07c89a($context, $indent, $value);
        }
        $buffer .= $indent . '>
';
        $blockFunction = $context->findInBlock('stickycontent');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $buffer .= $indent . '        ';
            $value = $this->resolveValue($context->find('stickycontent'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
        }
        $buffer .= $indent . '</div>
';
        $value = $context->find('js');
        $buffer .= $this->sectionAc74b050697219bb9b35cbf14f5b0438($context, $indent, $value);

        return $buffer;
    }

    private function section5a324ad1f27a187c309c4fa56c204493(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{ stickyclasses }}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $this->resolveValue($context->find('stickyclasses'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section352d85d73c1735100321ca105f9cdac8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' data-disable="true" ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' data-disable="true" ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section68abcf3ec7595c6741785560fd07c89a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        {{attribute}}="{{value}}"
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        ';
                $value = $this->resolveValue($context->find('attribute'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '="';
                $value = $this->resolveValue($context->find('value'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAc74b050697219bb9b35cbf14f5b0438(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'theme_alpha/sticky-footer\'], function(footer) {
    footer.init();
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'theme_alpha/sticky-footer\'], function(footer) {
';
                $buffer .= $indent . '    footer.init();
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
