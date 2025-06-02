import Image from "next/image";

export default function Home() {
  return (
    <div>
      <section className="hero">
        <h1 className="text-4xl font-bold">Bem-vindo à DevGuides!</h1>
        <p className="mt-2 text-lg">Explore nossos guias e tutoriais.</p>
        Título grande + subtítulo + botão CTA
      </section>

      <section className="search-bar mt-12">
        Barra de pesquisa
      </section>

      <section className="latest-guides mt-12">
        Cards dinâmicos com os últimos guias
      </section>

      <section className="stats mt-12">
        Números: guias pagos vendidos, usuários registrados, etc. 
      </section>

      <section className="benefits mt-12">
        Cards com ícones e textos: facilidade de uso, suporte, atualizações constantes, etc.
      </section>

      <section className="testimonials mt-12">
        Depoimentos de usuários
      </section>

      <section className="faq mt-12">
        Perguntas frequentes
      </section>

      <section className="newsletter mt-12">
        Formulário de inscrição para newsletter
      </section>

      <section className="call-to-action mt-12">
        Um CTA bem chamativo, incentivando o cadastro ou compra
      </section>
    </div>
  );
}