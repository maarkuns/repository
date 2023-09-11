function gerarParcelas(numeroParcelas, periodicidade, dataInicio) {
    // Converter a data de início em um objeto Date
    const data = new Date(dataInicio);
  
    // Array para armazenar as datas das parcelas
    const parcelas = [];
  
    // Loop para gerar as datas das parcelas
    for (let i = 0; i < numeroParcelas; i++) {
      // Clonar a data atual para evitar referência direta
      const dataParcela = new Date(data);
  
      // Adicionar a periodicidade (em dias) à data da parcela
      dataParcela.setDate(dataParcela.getDate() + i * periodicidade);
  
      // Adicionar a data da parcela ao array
      parcelas.push(dataParcela.toISOString().split('T')[0]); // Formato 'YYYY-MM-DD'
    }
  
    return parcelas;
  }
  
  // Exemplo de uso
  const numeroParcelas = 5; // Número total de parcelas
  const periodicidade = 30; // Intervalo entre as parcelas em dias (nesse caso, 30 dias)
  const dataInicio = '2023-09-01'; // Data de início das parcelas no formato 'YYYY-MM-DD'
  
  const parcelasGeradas = gerarParcelas(numeroParcelas, periodicidade, dataInicio);
  console.log(parcelasGeradas);
  