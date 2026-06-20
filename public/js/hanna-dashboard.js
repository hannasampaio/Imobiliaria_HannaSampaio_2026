
document.addEventListener('DOMContentLoaded', function () {
    const chartData = window.HannaDashboardChart || {};
    const labels = chartData.labels || [];
    const receitas = chartData.receitas || [];
    const totais = chartData.totais || [];

    const canvas = document.getElementById('vendasChart');

    if (!canvas || typeof Chart === 'undefined') {
        return;
    }

    const ctx = canvas.getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 280);
    gradient.addColorStop(0, 'rgba(201,162,39,.35)');
    gradient.addColorStop(1, 'rgba(201,162,39,0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels.length ? labels : ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [
                {
                    label: 'Faturamento (€)',
                    data: receitas.length ? receitas : [0, 0, 0, 0, 0, 0],
                    borderColor: '#c9a227',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.42,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#0b1f3a',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    backgroundColor: '#0b1f3a',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 12,

                    callbacks: {
                        label: function (context) {
                            const index = context.dataIndex;
                            const receita = context.raw ?? 0;
                            const vendas = totais[index] ?? 0;

                            return [
                                'Faturamento: € ' + Number(receita).toLocaleString('pt-PT', {
                                    minimumFractionDigits: 2
                                }),
                                'Vendas: ' + vendas
                            ];
                        }
                    }
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6b7280'
                    }
                },

                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#eef0f3'
                    },
                    ticks: {
                        color: '#6b7280',
                        callback: function (value) {
                            return '€ ' + Number(value).toLocaleString('pt-PT');
                        }
                    }
                }
            }
        }
    });
});
