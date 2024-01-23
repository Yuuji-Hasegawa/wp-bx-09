<?php get_header();?>
<div class="c-puton c-puton--filter js-pull-view">
  <picture class="o-frame o-frame--switch-l">
    <source type="image/avif"
      srcset="<?php echo get_template_directory_uri();?>/img/hero.avif" />
    <source type="image/webp"
      srcset="<?php echo get_template_directory_uri();?>/img/hero.webp" />
    <img
      src="<?php echo get_template_directory_uri();?>/img/hero.png"
      width="100%" height="100%" decoding="async" fetchpriority="high" alt="" />
  </picture>
  <div class="c-puton__inner o-cover">
    <h1 class="c-hero-copy o-cover__middle">
      <span class="c-display-l u-text-weight-b u-font-en-con">TERMS OF USE</span>
      <span class="c-display-xs"><?php the_title();?></span>
    </h1>
  </div>
</div>
<div class="o-box o-box--transparent o-center u-pb-2xl u-bg-qua">
  <h1 class="c-heading u-text-weight-b"><?php the_title();?></h1>
  <p class="c-content-l">
    本サイト規約（以下「本規約」と言います。）には、本サイトの利用条件及び当社とユーザーの皆様との間の権利義務関係が定められています。<br />本サイトの利用に際しては、本規約の全文をお読みいただいたうえで、本規約に同意いただく必要があります。
  </p>
  <dl class="o-stack u-mb-xl">
    <dt class="c-sec-heading u-text-center">第1条（適用）</dt>
    <dd class="c-content-l">
      <ol class="c-count-list">
        <li>
          本規約は、本サイトの利用条件及び本サイトの利用に関する当社とユーザーとの間の権利義務関係を定めることを目的とし、ユーザーと当社との間の本サイトの利用に関わる一切の関係に適用されます。
        </li>
        <li>
          本規約の内容と、その他の本規約外における本サイトの説明等とが異なる場合は、本規約の規定が優先して適用されるものとします。
        </li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第2条（定義）</dt>
    <dd class="c-content-l">
      本規約において使用する以下の用語は、各々以下に定める意味を有するものとします。
      <ol class="c-count-list c-count-list--secondary">
        <li>
          「知的財産権」とは、著作権、特許権、実用新案権、意匠権、商標権その他の知的財産権（それらの権利を取得し、またはそれらの権利につき登録等を出願する権利を含みます。）を意味します。
        </li>
        <li>
          「当社」とは、<?php echo get_vars('term', 'company');?>を意味します。
        </li>
        <li>
          「当社ウェブサイト」とは、そのドメインが「<?php echo get_vars('term', 'domain');?>」である、当社が運営するウェブサイト（理由の如何を問わず、当社のウェブサイトのドメインまたは内容が変更された場合は、当該変更後のウェブサイトを含みます。）を意味します。
        </li>
        <li>「ユーザー」とは、本サイトの利用者として情報の閲覧を行う個人または法人を意味します。</li>
        <li>
          「本サイト」とは、当社が提供する<?php echo get_vars('term', 'name');?>という名称のウェブサイト（理由の如何を問わずウェブサイトの名称または内容が変更された場合は、当該変更後のウェブサイトを含みます。）を意味します。
        </li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第3条（サイトの利用）</dt>
    <dd class="c-content-l">
      <ol class="c-count-list">
        <li>
          ユーザーは、本規約を遵守することに同意することにより、当社に対し、本サイトを利用することができます。
        </li>
        <li>
          本サイト訪問時、または当社からの通知を確認した時に、本規約の同意が成立したとみなし、ユーザーは本サイトを本規約に従い利用することができるようになります。
        </li>
        <li>
          当社は、ユーザーが、以下の各号のいずれかの事由に該当する場合は、本サイトの利用または閲覧を拒否することがあり、またその理由について一切開示義務を負いません。
          <ol class="c-count-list c-count-list--secondary">
            <li>
              未成年者、成年被後見人、被保佐人または被補助人のいずれかであり、法定代理人、後見人、保佐人または補助人の同意等を得ていなかった場合
            </li>
            <li>
              反社会的勢力等（暴力団、暴力団員、右翼団体、反社会的勢力、その他これに準ずる者を意味します。以下同じ。）である、または資金提供その他を通じて反社会的勢力等の維持、運営もしくは経営に協力もしくは関与する等反社会的勢力等との何らかの交流もしくは関与を行っていると当社が判断した場合
            </li>
            <li>過去当社との契約に違反した者またはその関係者であると当社が判断した場合</li>
            <li>その他、本サイトの利用を適当でないと当社が判断した場合</li>
          </ol>
        </li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第4条（禁止事項）</dt>
    <dd class="c-content-l">
      ユーザーは、本サイトの利用にあたり、以下の各号のいずれかに該当する行為または該当すると当社が判断する行為をしてはなりません。
      <ol class="c-count-list c-count-list--secondary">
        <li>法令に違反する行為または犯罪行為に関連する行為</li>
        <li>当社、本サイトの他の利用者またはその他の第三者に対する詐欺または脅迫行為</li>
        <li>公序良俗に反する行為</li>
        <li>
          当社、本サイトの他の利用者またはその他の第三者の知的財産権、肖像権、プライバシーの権利、名誉、その他の権利または利益を侵害する行為
        </li>
        <li>
          本サイトを通じ、以下に該当し、または該当すると当社が判断する情報を当社または本サイトの他の利用者に送信すること
          <ul class="c-disc-list">
            <li>過度に暴力的または残虐な表現を含む情報</li>
            <li>コンピューター・ウィルスその他の有害なコンピューター・プログラムを含む情報</li>
            <li>当社、本サイトの他の利用者またはその他の第三者の名誉または信用を毀損する表現を含む情報</li>
            <li>過度にわいせつな表現を含む情報</li>
            <li>差別を助長する表現を含む情報</li>
            <li>自殺、自傷行為を助長する表現を含む情報</li>
            <li>薬物の不適切な利用を助長する表現を含む情報</li>
            <li>反社会的な表現を含む情報</li>
            <li>チェーンメール等の第三者への情報の拡散を求める情報</li>
            <li>他人に不快感を与える表現を含む情報</li>
          </ul>
        </li>
        <li>本サイトのネットワークまたはシステム等に過度な負荷をかける行為</li>
        <li>当社が提供するソフトウェアその他のシステムに対するリバースエンジニアリングその他の解析行為</li>
        <li>本サイトの運営を妨害するおそれのある行為</li>
        <li>当社のネットワークまたはシステム等への不正アクセス</li>
        <li>第三者に成りすます行為</li>
        <li>当社が事前に許諾しない本サイト上での宣伝、広告、勧誘、または営業行為</li>
        <li>本サイトの他の利用者の情報の収集</li>
        <li>当社、本サイトの他の利用者またはその他の第三者に不利益、損害、不快感を与える行為</li>
        <li>
          当社ウェブサイト上で掲載する本サイト利用に関するルール(<a class="c-text-link"
            href="<?php echo home_url('/terms/');?>"
            target="_blank" rel="noopener"><span
              class="u-font-en-con"><?php echo home_url('/terms/');?></span></a>)に抵触する行為
        </li>
        <li>反社会的勢力等への利益供与</li>
        <li>面識のない異性との出会いを目的とした行為</li>
        <li>前各号の行為を直接または間接に惹起し、または容易にする行為</li>
        <li>前各号の行為を試みること</li>
        <li>その他、当社が不適切と判断する行為</li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第5条（本サイトの停止等）</dt>
    <dd class="c-content-l">
      当社は、以下のいずれかに該当する場合には、ユーザーに事前に通知することなく、本サイトの全部または一部の提供を停止または中断することができるものとします。
      <ol class="c-count-list c-count-list--secondary">
        <li>本サイトに係るコンピューター・システムの点検または保守作業を緊急に行う場合</li>
        <li>
          コンピューター、通信回線等の障害、誤操作、過度なアクセスの集中、不正アクセス、ハッキング等により本サイトの運営ができなくなった場合
        </li>
        <li>地震、落雷、火災、風水害、停電、天災地変などの不可抗力により本サイトの運営ができなくなった場合</li>
        <li>その他、当社が停止または中断を必要と判断した場合</li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第6条（権利帰属）</dt>
    <dd class="c-content-l">
      <ol class="c-count-list">
        <li>
          当社ウェブサイト及び本サイトに関する知的財産権は全て当社または当社にライセンスを許諾している者に帰属しており、本規約に基づく本サイトの利用許諾は、当社ウェブサイトまたは本サイトに関する当社または当社にライセンスを許諾している者の知的財産権の使用許諾を意味するものではありません。
        </li>
        <li>
          ユーザーは、当社及び当社から権利を承継しまたは許諾された者に対して著作者人格権を行使しないことに同意するものとします。
        </li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第7条（本サイトの内容の変更、終了）</dt>
    <dd class="c-content-l">
      <ol class="c-count-list">
        <li>当社は、当社の都合により、本サイトの内容を変更し、または提供を終了することができます。</li>
        <li>当社が本サイトの提供を終了する場合、当社はユーザーに事前に通知するものとします。</li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第8条（保証の否認及び免責）</dt>
    <dd class="c-content-l">
      <ol class="c-count-list">
        <li>
          当社は、本サイトがユーザーの特定の目的に適合すること、期待する機能・商品的価値・正確性・有用性を有すること、ユーザーによる本サイトの利用がユーザーに適用のある法令または業界団体の内部規則等に適合すること、継続的に利用できること、及び不具合が生じないことについて、明示又は黙示を問わず何ら保証するものではありません。
        </li>
        <li>
          当社は、本サイトに関してユーザーが被った損害につき、過去<?php echo get_vars('term', 'payterm');?>にユーザーが当社に支払った対価の金額を超えて賠償する責任を負わないものとし、また、付随的損害、間接損害、特別損害、将来の損害及び逸失利益にかかる損害については、賠償する責任を負わないものとします。
        </li>
        <li>
          本サイトまたは当社ウェブサイトに関連してユーザーと他のユーザーまたは第三者との間において生じた取引、連絡、紛争等については、ユーザーが自己の責任によって解決するものとします。
        </li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第9条（利用者情報の取扱い）</dt>
    <dd class="c-content-l">
      <ol class="c-count-list">
        <li>
          当社によるユーザーの利用者情報の取扱いについては、別途当社プライバシーポリシー(<a class="c-text-link"
            href="<?php echo home_url('/privacy-policy/');?>"
            target="_blank" rel="noopener"><span
              class="u-font-en-con"><?php echo home_url('/privacy-policy/');?></span></a>)の定めによるものとし、ユーザーはこのプライバシーポリシーに従って当社がユーザーの利用者情報を取扱うことについて同意するものとします。
        </li>
        <li>
          当社は、ユーザーが当社に提供した情報、データ等を、個人を特定できない形での統計的な情報として、当社の裁量で、利用及び公開することができるものとし、ユーザーはこれに異議を唱えないものとします。
        </li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第10条（本規約等の変更）</dt>
    <dd class="c-content-l">
      当社は、当社が必要と認めた場合は、本規約を変更できるものとします。本規約を変更する場合、変更後の本規約の施行時期及び内容を当社ウェブサイト上での掲示その他の適切な方法により周知し、またはユーザーに通知します。但し、法令上ユーザーの同意が必要となるような内容の変更の場合は、当社所定の方法でユーザーの同意を得るものとします。
    </dd>
    <dt class="c-sec-heading u-text-center">第11条（連絡／通知）</dt>
    <dd class="c-content-l">
      <ol class="c-count-list">
        <li>
          本サイトに関する問い合わせその他ユーザーから当社に対する連絡または通知、及び本規約の変更に関する通知その他当社からユーザーに対する連絡または通知は、当社の定める方法で行うものとします。
        </li>
        <li>
          当社が問い合わせ等に含まれるメールアドレスその他の連絡先に連絡または通知を行った場合、ユーザーは当該連絡または通知を受領したものとみなします。
        </li>
      </ol>
    </dd>
    <dt class="c-sec-heading u-text-center">第12条（分離可能性）</dt>
    <dd class="c-content-l">
      本規約のいずれかの条項またはその一部が、消費者契約法その他の法令等により無効または執行不能と判断された場合であっても、本規約の残りの規定及び一部が無効または執行不能と判断された規定の残りの部分は、継続して完全に効力を有するものとします。
    </dd>
    <dt class="c-sec-heading u-text-center">第13条（準拠法及び管轄裁判所）</dt>
    <dd class="c-content-l">
      <ol class="c-count-list">
        <li>本規約及びサイト利用契約の準拠法は日本法とします。</li>
        <li>
          本規約またはサイト利用契約に起因し、または関連する一切の紛争については、<?php echo get_vars('term', 'court');?>を第一審の専属的合意管轄裁判所とします。
        </li>
      </ol>
    </dd>
  </dl>
  <p class="c-suppl-l u-text-right">
    【<?php the_time('Y年m月d日');?> 制定】
    <?php if (get_the_modified_time('Y-m-d') != get_the_time('Y-m-d')) {
        echo '<br />【' . get_the_modified_time('Y年m月d日') . ' 改訂】';
    }?>
  </p>
</div>
<?php get_footer();?>