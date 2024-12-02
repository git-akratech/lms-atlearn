<?php

class __Mustache_b2ec50a5996cb487aacf6101eb39922b extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('theme_alpha/head')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body ';
        $value = $this->resolveValue($context->find('bodyattributes'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '>
';
        if ($partial = $this->mustache->loadPartial('core/local/toast/wrapper')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div id="page-wrapper" class="d-print-block">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.standard_top_of_body_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div id="page" data-region="mainpage" data-usertour="scroller" class="container-fluid drawers ';
        $value = $context->find('draweropenright');
        $buffer .= $this->section2f9abbbc7cfc8a578df65e02c2f006ff($context, $indent, $value);
        $buffer .= ' drag-container">
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_alpha/navbar')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        $buffer .= $indent . '            <div id="topofscroll" class="main-inner">
';
        $buffer .= $indent . '                <div id="page-content" class="page-content wrapper-page">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <div id="region-main-box" class="region-main-wrapper mt-3">
';
        $buffer .= $indent . '                        <section id="region-main" class="region-main-content" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section6b403a6a78537640b9e04a931aeb6463($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '                            <div class="rui-blocks-wrapper">
';
        $buffer .= $indent . '                                <div class="wrapper-course">
';
        $buffer .= $indent . '
';
        $value = $context->find('secondarymoremenu');
        $buffer .= $this->section1bc4063abae0eb77a34d0158ab99c9d5($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.simple_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('headeractions');
        $buffer .= $this->sectionF2f17fac7ce5db2b97e69b1429ac6508($context, $indent, $value);
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->find('pageheadingbutton'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->find('coursepageinformationbanners'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('hasregionmainsettingsmenu');
        $buffer .= $this->section47d38be224579d1e8081a7bd18f7754f($context, $indent, $value);
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.course_content_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $value = $context->find('headercontent');
        $buffer .= $this->section8e607540d8df0c21e13b683f47f49981($context, $indent, $value);
        $value = $context->find('overflow');
        $buffer .= $this->sectionC0c30e0ee5b81e0efa3fd0b5a5eee037($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                    <div class="rui-dashboard-top">
';
        $buffer .= $indent . '
';
        $value = $context->find('hasdtopblocks');
        $buffer .= $this->sectionBe982db986b92f6882fd8cc48c53e1c9($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                        <div class="rui-dashboard-main mb-4">';
        $value = $this->resolveValue($context->findDot('output.main_content'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '</div>
';
        $buffer .= $indent . '
';
        $value = $context->find('hasdbottomblocks');
        $buffer .= $this->section4964f822f7dfd817059ce1c1860ef341($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_alpha/hasblocks-tmpl')) {
            $buffer .= $partial->renderInternal($context, $indent . '                                ');
        }
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </section>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </div>
';
        if ($partial = $this->mustache->loadPartial('theme_alpha/footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        $value = $context->find('hiddensidebar');
        if (empty($value)) {
            
            if ($partial = $this->mustache->loadPartial('theme_alpha/nav-drawer')) {
                $buffer .= $partial->renderInternal($context, $indent . '            ');
            }
        }
        $buffer .= $indent . '        ';
        $value = $context->find('hidecourseindexnav');
        if (empty($value)) {
            
            if ($partial = $this->mustache->loadPartial('theme_alpha/courseindex-tmpl')) {
                $buffer .= $partial->renderInternal($context);
            }
        }
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.standard_after_main_region_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>
';
        $value = $context->find('js');
        $buffer .= $this->section6d7a120a112ea41741d31933d58439b3($context, $indent, $value);

        return $buffer;
    }

    private function section2f9abbbc7cfc8a578df65e02c2f006ff(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'show-hidden-drawer';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'show-hidden-drawer';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6b403a6a78537640b9e04a931aeb6463(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'content';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'content';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1bc4063abae0eb77a34d0158ab99c9d5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div class="secondary-navigation d-print-none">
                                            {{> core/moremenu}}
                                        </div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div class="secondary-navigation d-print-none">
';
                if ($partial = $this->mustache->loadPartial('core/moremenu')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                            ');
                }
                $buffer .= $indent . '                                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF2f17fac7ce5db2b97e69b1429ac6508(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div class="header-actions-container ml-1" data-region="header-actions-container">
                                            <div class="header-action">{{{.}}}</div>
                                        </div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div class="header-actions-container ml-1" data-region="header-actions-container">
';
                $buffer .= $indent . '                                            <div class="header-action">';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $buffer .= $indent . '                                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section47d38be224579d1e8081a7bd18f7754f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div class="region_main_settings_menu_proxy"></div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div class="region_main_settings_menu_proxy"></div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8e607540d8df0c21e13b683f47f49981(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        {{> core/activity_header }}
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('core/activity_header')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                        ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC0c30e0ee5b81e0efa3fd0b5a5eee037(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div class="container-fluid tertiary-navigation">
                                            <div class="navitem">
                                                {{> core/url_select}}
                                            </div>
                                        </div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div class="container-fluid tertiary-navigation">
';
                $buffer .= $indent . '                                            <div class="navitem">
';
                if ($partial = $this->mustache->loadPartial('core/url_select')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                                ');
                }
                $buffer .= $indent . '                                            </div>
';
                $buffer .= $indent . '                                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBe982db986b92f6882fd8cc48c53e1c9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                            <div id="blocks-dashboardtopblock" class="col-12 px-0">
                                                {{{ dtopblocks }}}
                                            </div>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                            <div id="blocks-dashboardtopblock" class="col-12 px-0">
';
                $buffer .= $indent . '                                                ';
                $value = $this->resolveValue($context->find('dtopblocks'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4964f822f7dfd817059ce1c1860ef341(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                            <div class="rui-dashboard-bottom mt-4 mb-4">
                                                <div data-region="blocks-dashboardbottomblock" class="col-12 p-0">
                                                    {{{ dbottomblocks }}}
                                                </div>
                                            </div>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                            <div class="rui-dashboard-bottom mt-4 mb-4">
';
                $buffer .= $indent . '                                                <div data-region="blocks-dashboardbottomblock" class="col-12 p-0">
';
                $buffer .= $indent . '                                                    ';
                $value = $this->resolveValue($context->find('dbottomblocks'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                                </div>
';
                $buffer .= $indent . '                                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6d7a120a112ea41741d31933d58439b3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    M.util.js_pending(\'theme_alpha/loader\');
    require([\'theme_alpha/loader\', \'theme_alpha/drawer\'], function(Loader, Drawer) {
    Drawer.init();
    M.util.js_complete(\'theme_alpha/loader\');
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    M.util.js_pending(\'theme_alpha/loader\');
';
                $buffer .= $indent . '    require([\'theme_alpha/loader\', \'theme_alpha/drawer\'], function(Loader, Drawer) {
';
                $buffer .= $indent . '    Drawer.init();
';
                $buffer .= $indent . '    M.util.js_complete(\'theme_alpha/loader\');
';
                $buffer .= $indent . '    });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
