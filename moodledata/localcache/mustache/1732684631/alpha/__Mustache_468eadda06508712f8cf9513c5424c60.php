<?php

class __Mustache_468eadda06508712f8cf9513c5424c60 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div ';
        $buffer .= ' class="';
        $blockFunction = $context->findInBlock('drawerclasses');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= ' d-print-none not-initialized"';
        $buffer .= ' data-region="fixed-drawer"';
        $buffer .= ' id="';
        $blockFunction = $context->findInBlock('id');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '"';
        $buffer .= ' data-preference="';
        $blockFunction = $context->findInBlock('drawerpreferencename');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '"';
        $buffer .= ' data-state="';
        $blockFunction = $context->findInBlock('drawerstate');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '"';
        $buffer .= ' data-forceopen="';
        $blockFunction = $context->findInBlock('forceopen');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $buffer .= '0';
        }
        $buffer .= '"';
        $buffer .= ' data-close-on-resize="';
        $blockFunction = $context->findInBlock('drawercloseonresize');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $buffer .= '0';
        }
        $buffer .= '"';
        $buffer .= '>
';
        $buffer .= $indent . '    <div class="drawerheader mt-2 ml-2 mr-0 mb-1">
';
        $buffer .= $indent . '        <button
';
        $buffer .= $indent . '            class="btn btn-icon btn-dark drawertoggle btn-close-drawer--left rui-icon-no-margin ml-2"
';
        $buffer .= $indent . '            data-toggler="drawers"
';
        $buffer .= $indent . '            data-action="closedrawer"
';
        $buffer .= $indent . '            data-target="';
        $blockFunction = $context->findInBlock('id');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '"
';
        $buffer .= $indent . '            data-toggle="tooltip"
';
        $buffer .= $indent . '            data-placement="';
        $blockFunction = $context->findInBlock('tooltipplacement');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $buffer .= 'right';
        }
        $buffer .= '"
';
        $buffer .= $indent . '            title="';
        $blockFunction = $context->findInBlock('closebuttontext');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            $value = $context->find('str');
            $buffer .= $this->section36783d1fe3b25f68270791f3280502a0($context, $indent, $value);
        }
        $buffer .= '"
';
        $buffer .= $indent . '        >
';
        $buffer .= $indent . '            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
';
        $buffer .= $indent . '                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L6.75 17.25"></path>
';
        $buffer .= $indent . '                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75L17.25 17.25"></path>
';
        $buffer .= $indent . '            </svg>
';
        $buffer .= $indent . '        </button>
';
        $buffer .= $indent . '        <div class="drawerheadercontent hidden">
';
        $buffer .= $indent . '            ';
        $blockFunction = $context->findInBlock('drawerheadercontent');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div class="drawercontent drag-container pt-1" data-usertour="scroller">
';
        $buffer .= $indent . '
';
        $value = $context->find('customcitcontent');
        $buffer .= $this->sectionC271a5a7bd6761e249903fa39b2c4dfc($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.display_course_progress'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        ';
        $blockFunction = $context->findInBlock('drawercontent');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        }
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('customcibcontent');
        $buffer .= $this->section1e148ac8eb43cfa8064673662c0b1131($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $value = $context->find('js');
        $buffer .= $this->sectionD252aa4c699850bc23fc2d6f5de17971($context, $indent, $value);

        return $buffer;
    }

    private function section36783d1fe3b25f68270791f3280502a0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'closedrawer, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'closedrawer, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC271a5a7bd6761e249903fa39b2c4dfc(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-customcitcontent rui-custom-sidebar-content my-4">
                {{{customcitcontent}}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-customcitcontent rui-custom-sidebar-content my-4">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('customcitcontent'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1e148ac8eb43cfa8064673662c0b1131(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-customcibcontent rui-custom-sidebar-content my-4">
                {{{customcibcontent}}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-customcibcontent rui-custom-sidebar-content my-4">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('customcibcontent'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD252aa4c699850bc23fc2d6f5de17971(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    require([\'theme_alpha/drawers\']);
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    require([\'theme_alpha/drawers\']);
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
